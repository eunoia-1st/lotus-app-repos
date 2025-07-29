<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionOption;

class QuestionOptionSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            ['question_value' => 'Sangat Baik'],
            ['question_value' => 'Baik'],
            ['question_value' => 'Cukup'],
            ['question_value' => 'Buruk'],
        ];

        foreach ($options as $opt) {
            QuestionOption::firstOrCreate($opt);
        }
    }
}
