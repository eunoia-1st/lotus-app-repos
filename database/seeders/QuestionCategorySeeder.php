<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionCategory;

class QuestionCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            /* 1 */
            ['name' => 'Pelayanan', 'is_published' => false],
            /* 2 */
            ['name' => 'Kebersihan', 'is_published' => false],
            /* 3 */
            ['name' => 'Suasana', 'is_published' => false],
            /* 4 */
            ['name' => 'Menu', 'is_published' => false],
            /* 5 */
            ['name' => 'Kemudahan', 'is_published' => false],
            /* 6 */
            ['name' => 'Keseluruhan', 'is_published' => false],
            /* 7 */
            ['name' => 'Harga', 'is_published' => false],
        ];

        foreach ($categories as $category) {
            QuestionCategory::create($category);
        }
    }
}
