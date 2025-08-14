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
        $cook1 = Employee::where('name', 'Fuad')->first();
        $cook2 = Employee::where('name', 'Maruf')->first();
        $cook3 = Employee::where('name', 'Andi')->first();
        $cook4 = Employee::where('name', 'Ahmad')->first();

        $waiter1 = Employee::where('name', 'Azkal')->first();
        $waiter2 = Employee::where('name', 'Tono')->first();
        $waiter3 = Employee::where('name', 'Tina')->first();
        $waiter4 = Employee::where('name', 'Imam')->first();

        $office1 = Employee::where('name', 'Mahmud')->first();
        $office2 = Employee::where('name', 'Andika')->first();

        if ($cook1) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $cook1->id,
                    'day'         => $day,
                    'start_time'  => '09:00:00',
                    'end_time'    => '17:00:00',
                    'shift_type'  => 'morning',
                ]);
            }
        }

        if ($cook2) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' =>  $cook2->id,
                    'day'         => $day,
                    'start_time'  => '09:00:00',
                    'end_time'    => '17:00:00',
                    'shift_type'  => 'morning',
                ]);
            }
        }

        if ($cook3) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $cook3->id,
                    'day'         => $day,
                    'start_time'  => '15:00:00',
                    'end_time'    => '23:00:00',
                    'shift_type'  => 'evening',
                ]);
            }
        }

        if ($cook4) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $cook4->id,
                    'day'         => $day,
                    'start_time'  => '15:00:00',
                    'end_time'    => '23:00:00',
                    'shift_type'  => 'evening',
                ]);
            }
        }

        if ($waiter1) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $waiter1->id,
                    'day'         => $day,
                    'start_time'  => '09:00:00',
                    'end_time'    => '17:00:00',
                    'shift_type'  => 'morning',
                ]);
            }
        }

        if ($waiter2) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $waiter2->id,
                    'day'         => $day,
                    'start_time'  => '09:00:00',
                    'end_time'    => '17:00:00',
                    'shift_type'  => 'morning',
                ]);
            }
        }

        if ($waiter3) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $waiter3->id,
                    'day'         => $day,
                    'start_time'  => '15:00:00',
                    'end_time'    => '23:00:00',
                    'shift_type'  => 'evening',
                ]);
            }
        }

        if ($waiter4) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $waiter4->id,
                    'day'         => $day,
                    'start_time'  => '15:00:00',
                    'end_time'    => '23:00:00',
                    'shift_type'  => 'evening',
                ]);
            }
        }

        //Office
        if ($office1) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $office1->id,
                    'day'         => $day,
                    'start_time'  => '09:00:00',
                    'end_time'    => '17:00:00',
                    'shift_type'  => 'morning',
                ]);
            }
        }

        if ($office2) {
            foreach ($days as $day) {
                EmployeeShift::create([
                    'employee_id' => $office2->id,
                    'day'         => $day,
                    'start_time'  => '15:00:00',
                    'end_time'    => '23:00:00',
                    'shift_type'  => 'evening',
                ]);
            }
        }
    }
}
