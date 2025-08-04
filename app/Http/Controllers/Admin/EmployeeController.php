<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create([
            'name' => $request->name,
            'position' => $request->position
        ]);

        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($days as $day) {
            $employee->employee_shifts()->create([
                'day' => $day,
                'start_time' => null,
                'end_time' => null,
                'shift_type' => null,
            ]);
        }

        return redirect()->route('employees.index');
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
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|in:office,cook,waiter,staff'
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee Deleted');
    }

    // Detail
    public function showDetails(Employee $employee)
    {
        $details = $employee->employee_shifts()->orderBy('day')->get();
        return view('employees.detail', compact('employee', 'details'));
    }

    public function editDetails(Employee $employee)
    {
        $details = $employee->employee_shifts()->get()->keyBy('day');

        return view('employees.edit_details', compact('employee', 'details'));
    }


    // update detail
    public function updateDetails(Request $request, Employee $employee)
    {
        $inputDetails = $request->input('detail', []);

        foreach ($inputDetails as $day => $values) {
            $detail = $employee->employee_shifts()->where('day', $day)->first();

            if ($detail) {
                if (isset($values['is_off']) && $values['is_off']) {
                    $detail->update([
                        'start_time' => null,
                        'end_time' => null,
                        'shift_type' => null,
                    ]);
                } else {
                    $detail->update([
                        'start_time' => $values['start_time'] ?? null,
                        'end_time' => $values['end_time'] ?? null,
                        'shift_type' => $values['shift_type'] ?? null,
                    ]);
                }
            }
        }

        return redirect()->route('employees.details', $employee->id)->with('success', 'Detail shift berhasil diperbarui.');
    }
}
