<?php

namespace App\Http\Controllers\Customer;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackAnswerController extends Controller
{
    public function index()
    {
        $feedbackAnswer = Feedback::with([
            'answers.question.question_category'
        ])
            ->latest()
            ->get();

        return view('feedback_answers.index', compact('feedbackAnswer'));
    }

    public function show($id)
    {
        $feedbackAnswer = Feedback::with([
            'answers.question.question_category',
            'answers.question.question_options',
            'customer',
            'seat',
            'employees.employee_shifts'
        ])->findOrFail($id);

        return view('feedback_answers.show', compact('feedbackAnswer'));
    }
}
