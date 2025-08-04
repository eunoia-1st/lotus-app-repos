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
        return $this->hasMany(EmployeeShift::class,  'employee_id');
    }

    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class, 'employee_feedbacks', 'employee_id', 'feedback_id')->withTimestamps();
    }
}
