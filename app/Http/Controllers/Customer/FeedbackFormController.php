<?php

namespace App\Http\Controllers\Customer;

use App\Models\Seat;
use App\Models\Answer;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\EmployeeFeedback;
use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;

class FeedbackFormController extends Controller
{
    // menampilkan pilihan kategori
    public function showCategories()
    {
        $categories = QuestionCategory::where('is_published', true)->get();

        return view('feedback_forms.categories', compact('categories'));
    }

    // menampilkan pertanyaan setelah user memilih kategori
    public function showQuestions($categoryId)
    {
        $category = QuestionCategory::findOrFail($categoryId);

        $questions = Question::with('question_options')->where('question_category_id', $categoryId)->get();

        $seats = Seat::all();

        if ($questions->isEmpty()) {
            dd('Tidak ada pertanyaan untuk kategori ini', $categoryId);
        }

        return view('feedback_forms.questions', compact('category', 'questions', 'seats'));
    }

    public function submit(Request $request, $categoryId)
    {
        $request->validate([
            'seat_id' => 'required|exists:seats,id',
            'answers' => 'required|array',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:20',
            'address' => 'required|string|max:255'
        ]);

        if (empty($request->email) && empty($request->phone)) {
            return back()->withErrors([
                'email' => 'Email atau nomor telepon wajib diisi.',
                'phone' => 'Email atau nomor telepon wajib diisi.',
            ])->withInput();
        }

        $customer = Customer::where(function ($query) use ($request) {
            if (!empty($request->email)) {
                $query->orWhere('email', $request->email);
            }

            if (!empty($request->phone)) {
                $query->orWhere('phone', $request->phone);
            }
        })->first();

        if (!$customer) {
            $customer = Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address ?? null,
            ]);
        }

        // Buat feedback baru
        $feedback = Feedback::create([
            'seat_id' => $request->seat_id,
            'customer_id' => $customer->id, // Atau isi jika login
        ]);

        // Simpan jawaban
        foreach ($request->answers as $questionId => $answer) {
            $question = Question::with('question_options')->find($questionId); // ambil tipe pertanyaannya
            if ($question->question_type === 'checkbox') {
                foreach ($answer as $optionId) {
                    Answer::create([
                        'feedback_id'  => $feedback->id,
                        'question_id'  => $questionId,
                        'option_id'    => $optionId,
                        // Tidak perlu answer_text untuk checkbox
                    ]);
                }
            } elseif ($question->question_type === 'option') {
                Answer::create([
                    'feedback_id'  => $feedback->id,
                    'question_id'  => $questionId,
                    'option_id'    => $answer,
                    // Tidak perlu answer_text untuk option
                ]);
            } else {
                // Text input
                if (is_array($answer)) {
                    $answer = implode(', ', $answer);
                }
                Answer::create([
                    'feedback_id'  => $feedback->id,
                    'question_id'  => $questionId,
                    'answer_text'  => $answer,
                ]);
            }
        }

        $feedbackTime = now();
        $dayName = $feedbackTime->format('l');
        $currentTime = $feedbackTime->format('H:i:s');

        $employees = Employee::whereHas('employee_shifts', function ($query) use ($dayName, $currentTime) {
            $query->where('day', $dayName)
                ->where(function ($q) use ($currentTime) {
                    // Shift normal
                    $q->where(function ($normal) use ($currentTime) {
                        $normal->whereTime('start_time', '<=', $currentTime)
                            ->whereTime('end_time', '>=', $currentTime);
                    });

                    // Shift melewati tengah malam
                    $q->orWhere(function ($overnight) use ($currentTime) {
                        $overnight->whereRaw('TIME(start_time) > TIME(end_time)')
                            ->where(function ($inner) use ($currentTime) {
                                $inner->whereTime('start_time', '<=', $currentTime)
                                    ->orWhereTime('end_time', '>=', $currentTime);
                            });
                    });
                });
        })->get();


        foreach ($employees as $employee) {
            EmployeeFeedback::create([
                'employee_id' => $employee->id,
                'feedback_id' => $feedback->id,
            ]);
        }

        return redirect()->route('feedback.success'); // buatkan route success jika perlu
    }
}
