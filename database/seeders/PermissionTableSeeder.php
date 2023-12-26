<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'user-list',
            'user-crete',
            'user-edit',
            'user-delete',
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            'listing-list',
            'listing-create',
            'listing-edit',
            'listing-delete',
            'booking-list',
            'booking-create',
            'booking-edit',
            'booking-delete',
            'clientele-list',
            'clientele-create',
            'clientele-edit',
            'clientele-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'career-list',
            'career-create',
            'career-edit',
            'career-delete',
            'meeting-list',
            'meeting-create',
            'meeting-edit',
            'meeting-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'news-list',
            'news-create',
            'news-edit',
            'news-delete',
            'media-list',
            'media-create',
            'media-edit',
            'media-delete',
            'broker-list',
            'broker-create',
            'broker-edit',
            'broker-delete',
            'lead-list',
            'lead-create',
            'lead-edit',
            'lead-delete',
            'webcontent-list',
            'webcontent-create',
            'webcontent-edit',
            'webcontent-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
