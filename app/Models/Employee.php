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
        return $this->hasMany(EmployeeShift::class);
    }

    public function feedbacks()
    {
        return $this->belongsToMany(Feedback::class, 'employee_feedbacks')
            ->withTimestamps();
    }
}
