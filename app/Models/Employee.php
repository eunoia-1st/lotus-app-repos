<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position'
    ];

    public function employee_shifts()
    {
        return $this->belongsToMany(EmployeeShift::class, 'employee_shift_pivot', 'employee_id', 'shift_id');
    }

    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class, 'employee_feedbacks', 'employee_id', 'feedback_id')->withTimestamps();
    }
}
