<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\QuestionOption;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        /** ================================
         *  1. Pertanyaan Multiple Choice
         * ================================ */

        // Ambil atau buat kategori 'Pelayanan'
        $categoryPelayanan = QuestionCategory::firstOrCreate([
            'name' => 'Pelayanan'
        ]);

        // Ambil ID opsi jawaban dari tabel question_options
        $optionIds = QuestionOption::whereIn('question_value', [
            'Sangat Baik',
            'Baik',
            'Cukup',
            'Buruk'
        ])->pluck('id');

        // Buat pertanyaan multiple choice
        $questionMultiple = Question::create([
            'question_category_id' => $categoryPelayanan->id,
            'question_text' => 'Bagaimana penilaian Anda terhadap pelayanan kami?',
            'question_type' => 'radio',
        ]);

        // Hubungkan ke opsi jawaban melalui pivot
        $questionMultiple->question_options()->attach($optionIds);


        /** ================================
         *  2. Pertanyaan Text (Isian Bebas)
         * ================================ */

        // Ambil atau buat kategori 'Kebersihan'
        $categoryKebersihan = QuestionCategory::firstOrCreate([
            'name' => 'Kebersihan'
        ]);

        // Buat pertanyaan teks
        Question::create([
            'question_category_id' => $categoryKebersihan->id,
            'question_text' => 'Silakan beri saran atau masukan Anda tentang kebersihan tempat kami.',
            'question_type' => 'text',
        ]);
    }
}
