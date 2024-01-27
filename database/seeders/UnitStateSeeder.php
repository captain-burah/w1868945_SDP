<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitState;

class UnitStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitState::create([
            'name' => 'Listed'
        ]);

        UnitState::create([
            'name' => 'Booked'
        ]);

        UnitState::create([
            'name' => 'Amortizing'
        ]);

        UnitState::create([
            'name' => 'Sold'
        ]);

        UnitState::create([
            'name' => 'Resale'
        ]);
    }
}
