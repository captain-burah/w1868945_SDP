<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\Project::factory(10)->create();
        // \App\Models\Unit::factory(10)->create();

        // \App\Models\Project::factory(10)->create()->each(function ($unit) {
        //     $unit->units()->saveMany(\App\Models\Unit::factory(10)->make());
        // });

        // \App\Models\Project::factory(10)->create()->each(function($project) {
        //     \App\Models\Unit::factory(2)->create(['project_id' => $project->id ])->each(function($unit) {
        //         \App\Models\Unit_paymentplan::factory(1)->create(['unit_id' => $unit->id ])->each(function($plan) {
        //             \App\Models\UnitPaymentplanFile::factory(5)->create(['unit_paymentplan_id' => $plan->id ]);
        //         });
        //     });
        // });


        \App\Models\Community::factory(10)->create()->each(function($community) {
            \App\Models\CommunityImage::factory(2)->create(['community_id' => $community->id ]);
        });

        $this->call([
            PermissionTableSeeder::class,
            CreateAdminUserSeeder::class,
            ProjectStatusSeeder::class,
            UnitStatusSeeder::class,
            UnitStateSeeder::class,
            PropertyReleaseSeeder::class,
            HonorificSeeder::class,
            CountryCodeSeeder::class,
            SeoSeeder::class,
            EmiratesSeeder::class,
            ProjectTypeSeeder::class,
            ProjectSeeder::class,
            UnitSeeder::class,
            BrokerSeeder::class,
        ]);
    }
}
