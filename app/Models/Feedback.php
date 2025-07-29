<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $fillable = [
        'seat_id',
        'customer_id'
    ];

    public function feedback_reviews()
    {
        return $this->hasMany(FeedbackReview::class, 'feedback_id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'feedback_id');
    }


    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_feedbacks', 'feedback_id', 'employee_id')->withTimestamps();
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
