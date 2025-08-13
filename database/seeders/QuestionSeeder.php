<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionOption;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        // Seeder Kategori Pelayanan
        Question::create([
            'question_category_id' => 1,
            'question_text' => 'Menurut Anda, apa yang paling berkesan dari pelayanan kami?',
            'question_type' => 'text',
        ]);


        $question1 = Question::create([
            'question_category_id' => 1,
            'question_text' => 'Berikan rating keramahan staff di restoran kami',
            'question_type' => 'option',
        ]);

        $question1->question_options()->createMany([
            ['question_value' => 'Sangat Ramah'],
            ['question_value' => 'Biasa'],
            ['question_value' => 'Kasar'],
        ]);

        $question2 = Question::create([
            'question_category_id' => 1,
            'question_text' => 'Layanan apa yang menurut Anda perlu ditingkatkan?',
            'question_type' => 'checkbox',
        ]);

        $question2->question_options()->createMany([
            ['question_value' => 'Kecepatan Pelayanan'],
            ['question_value' => 'Penguasaan menu oleh Staff'],
            ['question_value' => 'Keramahanan Staf'],
            ['question_value' => 'Kenyamanan restoran'],
        ]);

        Question::create([
            'question_category_id' => 1,
            'question_text' => 'Saran Anda untuk meningkatkan pelayanan kami.',
            'question_type' => 'text',
        ]);

        // Seeder Kategori Kebersihan
        $question3 = Question::create([
            'question_category_id' => 2,
            'question_text' => 'Sebearapa puas Anda dengan kebersihan Restoran Kami?',
            'question_type' => 'option',
        ]);

        $question3->question_options()->createMany([
            ['question_value' => 'Sangat Puas'],
            ['question_value' => 'Cukup'],
            ['question_value' => 'Tidak Puas'],
        ]);


        Question::create([
            'question_category_id' => 2,
            'question_text' => 'Berikan saran dan komentar terkait kebersihan di Restoran Kami.',
            'question_type' => 'text',
        ]);

        $question4 = Question::create([
            'question_category_id' => 2,
            'question_text' => 'Seberapa sering Anda melihat petugas kebersihan membersihkan area selama kunjungan?',
            'question_type' => 'option',
        ]);

        $question4->question_options()->createMany([
            ['question_value' => 'Sering'],
            ['question_value' => 'Jarang'],
            ['question_value' => 'Tidak Pernah'],
        ]);

        $question5 = Question::create([
            'question_category_id' => 2,
            'question_text' => 'Area mana saja yang perlu perhatian lebih? (Pilih semua yang relevan)',
            'question_type' => 'checkbox',
        ]);

        $question5->question_options()->createMany([
            ['question_value' => 'Meja dan Kursi'],
            ['question_value' => 'Lantai dan Karpet'],
            ['question_value' => 'Kamar Mandi'],
            ['question_value' => 'Tempat Sampah'],
        ]);
    }
}
