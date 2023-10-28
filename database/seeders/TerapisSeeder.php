<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class TerapisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
 
    	for($i = 1; $i <= 5; $i++){
            DB::table('users')->insert([
                'NoIdentitas' => $faker->randomNumber(9,true),
                'role' => 3,
                'IdTipe' => 1,
                'Nama' => $faker->name,
                'Alamat' => $faker->address,
                'NoHP' => $faker->phoneNumber,
                'StatusAktif' => 1, // Sesuaikan dengan status aktif yang sesuai
                'Username' => $faker->firstName,
                'Password' => Hash::make('Terapis'),
                'email' => $faker->email,
                'email_verified_at' => null, // Jika Anda ingin memasukkan data ini
                'remember_token' => null, // Jika Anda ingin memasukkan data ini
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
