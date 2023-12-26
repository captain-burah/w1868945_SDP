<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Unit_status;

class UnitStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit_status::create([
            'name' => 'Active'
        ]);

        Unit_status::create([
            'name' => 'Draft'
        ]);

        Unit_status::create([
            'name' => 'Trash'
        ]);

        
    }
}
