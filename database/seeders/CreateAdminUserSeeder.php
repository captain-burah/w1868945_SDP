<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Seeder
        $user = User::create([
            'name' => 'Master Admin',
            'email' => 'webmaster@esnaad.com',
            'password' => bcrypt('edge@1315')
        ]);

        $user = User::create([
            'name' => 'Hasna A.',
            'email' => 'hasna@esnaad.com',
            'password' => bcrypt('hasna@2024/1315')
        ]);

        $role = Role::create(['name' => 'Developer']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
