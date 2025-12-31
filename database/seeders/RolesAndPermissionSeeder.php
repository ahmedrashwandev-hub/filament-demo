<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'manage products']);
        Permission::firstOrCreate(['name' => 'manage categories']);

        $admin   = Role::firstOrCreate(['name' => 'admin']);
        $manager = Role::firstOrCreate(['name' => 'manager']);

        $admin  ->givePermissionTo(Permission::all());
        $manager->givePermissionTo(['manage products']);

        $user = User::first();
        $user->assignRole('admin');
    }
}
