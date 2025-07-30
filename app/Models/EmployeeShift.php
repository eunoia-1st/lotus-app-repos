<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeShift extends Model
{
    protected $fillable = [
        'shift_date',
        'start_time',
        'end_time',
        'shift_type'
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_shift_pivot', 'shift_id', 'employee_id');
    }
}
