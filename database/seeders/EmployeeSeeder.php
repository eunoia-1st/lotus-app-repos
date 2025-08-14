<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cook
        Employee::create([
            'name' => 'Fuad',
            'position' => 'cook',
        ]);

        Employee::create([
            'name' => 'Maruf',
            'position' => 'cook',
        ]);

        Employee::create([
            'name' => 'Andi',
            'position' => 'cook',
        ]);

        Employee::create([
            'name' => 'Ahmad',
            'position' => 'cook',
        ]);

        // Waiter
        Employee::create([
            'name' => 'Azkal',
            'position' => 'waiter',
        ]);

        Employee::create([
            'name' => 'Tono',
            'position' => 'waiter',
        ]);

        Employee::create([
            'name' => 'Tina',
            'position' => 'waiter',
        ]);

        Employee::create([
            'name' => 'Imam',
            'position' => 'waiter',
        ]);

        // Office
        Employee::create([
            'name' => 'Mahmud',
            'position' => 'office',
        ]);

        Employee::create([
            'name' => 'Andika',
            'position' => 'office',
        ]);
    }
}
