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
            'Nama' => 'Aldo Sentosa',
            'Alamat' => 'Jl. Gunung Latimojong No.129-A, Maradekaya, Kec. Makassar, Kota Makassar, Sulawesi Selatan 90145',
            'NoHP' => '(+62)81393133016',
            'StatusAktif' => 1, // Sesuaikan dengan status aktif yang sesuai
            'Username' => 'Aldo Sentosa',
            'Password' => Hash::make('Apotik_Andika'),
            'email' => 'sentosaaldo@gmail.com',
            'email_verified_at' => null, // Jika Anda ingin memasukkan data ini
            'remember_token' => null, // Jika Anda ingin memasukkan data ini
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
} 
