<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\QuestionCategory;
use App\Http\Controllers\Controller;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = QuestionCategory::all();
        return view('question_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('question_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:question_categories,name'
        ]);

        QuestionCategory::create([
            'name' => $request->name,
            // defaultnya 'false'
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('question-categories.index')->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(QuestionCategory $questionCategory)
    {
        return view('question_categories.show', compact('questionCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionCategory $questionCategory)
    {
        return view('question_categories.edit', compact('questionCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionCategory $questionCategory)
    {
        $request->validate([
            'name' => 'required|unique:question_categories, name,' . $questionCategory->id,
        ]);

        $questionCategory->update([
            'name' => $request->name,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('question-categories.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionCategory $questionCategory)
    {
        $questionCategory->delete();

        return redirect()->route('question-categories.index')->with('success', 'Category Deleted');
    }

    // togglePublish
    public function togglePublish(QuestionCategory $category)
    {
        $category->update([
            'is_published' => !$category->is_published
        ]);

        return redirect()->route('question-categories.index')->with('success', 'Status Changed');
    }
}
