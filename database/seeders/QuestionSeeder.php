<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionOption;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $question = Question::create([
            'question_category_id' => 1,
            'question_text' => 'Apa warna favoritmu?',
            'question_type' => 'option',
        ]);

        $question->question_options()->createMany([
            ['question_value' => 'Merah'],
            ['question_value' => 'Biru'],
        ]);

        Question::create([
            'question_category_id' => 1,
            'question_text' => 'Apa harapanmu di tahun ini?',
            'question_type' => 'text',
        ]);
    }
}
