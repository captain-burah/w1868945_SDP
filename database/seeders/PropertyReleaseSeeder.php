<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Property_release;

class PropertyReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Property_release::create([
            'name' => 'Off Plan'
        ]);

        Property_release::create([
            'name' => 'Ready'
        ]);
    }
}
