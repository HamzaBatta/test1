<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'gallery-list',
            'gallery-create',
            'gallery-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'about-list',
            'about-create',
            'about-edit',
            'about-delete'];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
