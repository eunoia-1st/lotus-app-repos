<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Seat;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seat::create([
            'name' => '5A'
        ]);

        Seat::create([
            'name' => '3'
        ]);

        Seat::create([
            'name' => '1'
        ]);
        Seat::create([
            'name' => '2'
        ]);
        Seat::create([
            'name' => '5'
        ]);
        Seat::create([
            'name' => '6'
        ]);
        Seat::create([
            'name' => '16'
        ]);
        Seat::create([
            'name' => '17'
        ]);
    }
}
