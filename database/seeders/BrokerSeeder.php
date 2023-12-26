<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Broker;

class BrokerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Broker::create([
        //     'id' => '1',
        //     'status' => '1',
        //     'company_type' => 'LLC',
        //     'company_name' => 'Edge Realty Real Estate',
        //     'state' => 'Dubai',
            
        // ]);

        Broker::create([
            'id' => '2',
            'status' => '1',
            'company_type' => 'LLC',
            'company_name' => 'Oh yeah Real Estate',
            'state' => 'Dubai',
            
        ]);

        Broker::create([
            'id' => '3',
            'status' => '1',
            'company_type' => 'LLC',
            'company_name' => 'Munchins Home Rental',
            'state' => 'Dubai',
            
        ]);

        Broker::create([
            'id' => '4',
            'status' => '1',
            'company_type' => 'LLC',
            'company_name' => 'OH My My Home Rental',
            'state' => 'Dubai',
            
        ]);
    }
}
