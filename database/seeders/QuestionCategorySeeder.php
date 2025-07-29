<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionCategory;

class QuestionCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Pelayanan', 'is_published' => false],
            ['name' => 'Kebersihan', 'is_published' => false],
            ['name' => 'Makanan', 'is_published' => false],
            ['name' => 'Suasana', 'is_published' => false],
            ['name' => 'Harga', 'is_published' => false],
        ];

        foreach ($categories as $category) {
            QuestionCategory::create($category);
        }
    }
}
