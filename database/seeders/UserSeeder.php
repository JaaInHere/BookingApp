<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'master',
            'email' => 'test@fake.com',
            'role' => 'admin',
            'password' => 'pass12345'
        ]);

        User::create([
            'name' => 'user 1',
            'email' => 'user1@fake.com',
            'password' => 'pass12345'
        ]);
    }
}