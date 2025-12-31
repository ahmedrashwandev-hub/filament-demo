<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage categories']);

        $admin = Role::create(['name' => 'admin']);
        $manager = Role::create(['name' => 'manager']);

        $admin  ->givePermissionTo(Permission::all());
        $manager->givePermissionTo(['manage products']);
    }
}
