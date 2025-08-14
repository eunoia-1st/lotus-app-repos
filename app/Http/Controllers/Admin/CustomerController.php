<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Menampilkan Feedback yang telah diisi sesuai Customer
     */
    public function showFeedbacks(string $id)
    {
        $customer = Customer::findOrFail($id);

        $feedbacks = Feedback::with([
            'answers.question.question_category'
        ])
            ->where('customer_id', $customer->id)
            ->latest()
            ->get();

        return view('customers.feedbacks', compact('customer', 'feedbacks'));
    }

    public function feedbackDetail($id)
    {
        $feedbackDetail = Feedback::with([
            'answers.question.question_category',
            'answers.question.question_options',
            'customer',
            'seat',
            'employees.employee_shifts'
        ])->findOrFail($id);

        return view('customers.feedbackDetail', compact('feedbackDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $employee)
    {
        $employee->delete();
        return redirect()->route('customers.index')->with('success', 'Customer Deleted');
    }
}
