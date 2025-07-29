<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function feedback_reviews()
    {
        return $this->hasMany(FeedbackReview::class, 'admin_id');
    }
}
