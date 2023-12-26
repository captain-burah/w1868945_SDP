<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Emirate;

class EmiratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Dubai',
            'city_name_ru' => 'Dubai',
            'city_name_ar' => 'دبي ',
            'city_code' => 'DXB',
            'zip_code' => '0',
            'status' => '1'
        ]);

        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Abu Dhabi',
            'city_name_ru' => 'Abu Dhabi',
            'city_name_ar' => 'بو ظبي ',
            'city_code' => 'AUH',
            'zip_code' => '0',
            'status' => '1'
        ]);

        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Sharjah',
            'city_name_ru' => 'Sharjah',
            'city_name_ar' => 'الشارقة ',
            'city_code' => 'FJR',
            'zip_code' => '0',
            'status' => '1'
        ]);

        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Ajman',
            'city_name_ru' => 'Ajman',
            'city_name_ar' => 'عجمان ',
            'city_code' => 'AUH',
            'zip_code' => '0',
            'status' => '1'
        ]);


        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Fujeirah',
            'city_name_ru' => 'Fujeirah',
            'city_name_ar' => 'الفجيرة  ',
            'city_code' => 'FJR',
            'zip_code' => '0',
            'status' => '1'
        ]);

        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Ras Al Khaima',
            'city_name_ru' => 'Ras Al Khaima',
            'city_name_ar' => 'راس الخيمه  ',
            'city_code' => 'QAJ',
            'zip_code' => '0',
            'status' => '1'
        ]);

        Emirate::create([
            'country_id' => '205',
            'city_name_en' => 'Umm Al Quwain',
            'city_name_ru' => 'Umm Al Quwain',
            'city_name_ar' => 'أم القيوين',
            'city_code' => 'OMUQ',
            'zip_code' => '0',
            'status' => '1'
        ]);

    }
}

