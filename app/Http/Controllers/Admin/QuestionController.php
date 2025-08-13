<?php

namespace App\Http\Controllers\Admin;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($category_id)
    {
        $category = QuestionCategory::with('questions')->findOrFail($category_id);

        return view('questions.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($category_id)
    {
        $category = QuestionCategory::findOrFail($category_id);

        return view('questions.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $category_id)
    {
        $request->validate([
            'question_text' => 'required|string',
            'question_type' => 'required|in:text,option,checkbox',
        ]);

        Question::create([
            'question_category_id' => $category_id,
            'question_text' => $request->question_text,
            'question_type' => $request->question_type,
        ]);

        return redirect()->route('questions.index', $category_id)->with('success', 'Question Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $question = Question::findOrFail($id);

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'question_text' => 'required|string',
            'question_type' => 'required|in:text,option,checkbox'
        ]);

        $question->update($request->only('question_text', 'question_type'));

        return redirect()->route('questions.index', $question->question_category_id)->with('success', 'Question Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id);
        $category_id = $question->question_category_id;
        $question->delete();

        return redirect()->route('question.index', $category_id)->with('success', 'Question Deleted');
    }
}
