<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Project_status;

class ProjectStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project_status::create([
            'name' => 'Active'
        ]);

        Project_status::create([
            'name' => 'Draft'
        ]);

        Project_status::create([
            'name' => 'Trash'
        ]);
    }
}
