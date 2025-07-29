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
        Employee::create([
            'name' => 'Chef Fuad',
            'position' => 'cook',
        ]);

        Employee::create([
            'name' => 'Waiter Azkal',
            'position' => 'waiter',
        ]);
    }
}
