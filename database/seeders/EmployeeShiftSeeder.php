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

        // TODO : Urgent
        // bagian shift date nanti harus diubah agar pengisian tanggal bisa manual
        EmployeeShift::create([
            'shift_date' => now()->toDateString(),
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'shift_type' => 'morning',
        ]);

        EmployeeShift::create([
            'shift_date' => now()->toDateString(),
            'start_time' => '15:00:00',
            'end_time' => '23:00:00',
            'shift_type' => 'evening',
        ]);
    }
}
