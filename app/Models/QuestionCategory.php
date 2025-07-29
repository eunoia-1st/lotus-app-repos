<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $fillable = [
        'name',
        'is_published'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'question_category_id');
    }
}
