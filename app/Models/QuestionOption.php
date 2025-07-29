<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $fillable = [
        'question_value',
    ];

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'question_option_pivot', 'option_id', 'question_id');
    }
}
