<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id' => 2345123,
            'name' => 'aldosentosa',
            'email' => 'aldosentosa@gmail.com',
            'role' => 'Owner',
            'email_verified_at' => null,
            'password' => Hash::make('aldosentosa'), // Hashing password
            'remember_token' => null,
            'created_at' => null,
            'updated_at' => null,
        ]);
    }
} 
