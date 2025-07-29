<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\EmployeeShift;

class EmployeeShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chef = Employee::where('name', 'Chef Fuad')->first();
        $waiter = Employee::where('name', 'Waiter Azkal')->first();

        if ($chef) {
            EmployeeShift::create([
                'employee_id' => $chef->id,
                'shift_date' => now()->toDateString(),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'shift_type' => 'morning',
            ]);
        }

        if ($waiter) {
            EmployeeShift::create([
                'employee_id' => $waiter->id,
                'shift_date' => now()->toDateString(),
                'start_time' => '15:00:00',
                'end_time' => '23:00:00',
                'shift_type' => 'evening',
            ]);
        }
    }
}
