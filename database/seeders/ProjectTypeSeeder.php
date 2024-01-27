<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project_type;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project_type::create([
            'name_en' => 'Apartment',
            'name_ar' => 'شقة',
        ]);
        Project_type::create([
            'name_en' => 'Villa',
            'name_ar' => 'فيلا',
        ]);
        Project_type::create([
            'name_en' => 'Commercial',
            'name_ar' => 'تجاري',
        ]);
        Project_type::create([
            'name_en' => 'Duplex',
            'name_ar' => 'دوبلكس',
        ]);
        Project_type::create([
            'name_en' => 'Townhouse',
            'name_ar' => 'تاون هاوس',
        ]);
    }
}
