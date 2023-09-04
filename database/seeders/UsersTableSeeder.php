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
            'NoIdentitas' => 2345123,
            'role' => 1,
            // 1 = Owner (Super Admin)
            // 2 = Administrasi (Admin)
            // 3 = Terapis (User) tolong tanya Brian atau Agus mengenai hal ini
            'Nama' => 'Owner',
            'Alamat' => 'Alamat Anda',
            'NoHP' => 'No HP Anda',
            'StatusAktif' => 1, // Sesuaikan dengan status aktif yang sesuai
            'Username' => 'owner',
            'Password' => Hash::make('Owner'),
            'email' => 'owner@gmail.com',
            'email_verified_at' => null, // Jika Anda ingin memasukkan data ini
            'remember_token' => null, // Jika Anda ingin memasukkan data ini
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
} 
