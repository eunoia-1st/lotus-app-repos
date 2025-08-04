<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\EmployeeShift;

class EmployeeShiftSeeder extends Seeder
{
    public function run(): void
    {
        $days = [
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday'
        ];

        // Ambil pegawai berdasarkan nama (dari EmployeeSeeder)
        $chefFuad = Employee::where('name', 'Chef Fuad')->first();
        $waiterAzkal = Employee::where('name', 'Waiter Azkal')->first();

        if ($chefFuad) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $chefFuad->id,
                    'day'         => $day,
                    'start_time'  => '09:00:00',
                    'end_time'    => '17:00:00',
                    'shift_type'  => 'morning',
                ]);
            }
        }

        if ($waiterAzkal) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $waiterAzkal->id,
                    'day'         => $day,
                    'start_time'  => '15:00:00',
                    'end_time'    => '23:00:00',
                    'shift_type'  => 'evening',
                ]);
            }
        }
    }
}
