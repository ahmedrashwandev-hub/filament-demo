<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
{
    User::create([
        'name' => 'Normal User',
        'email' => 'rashwan1@test.com',
        'role' => 'user',
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);
}
}
