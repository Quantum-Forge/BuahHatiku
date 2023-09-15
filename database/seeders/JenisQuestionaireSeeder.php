<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisQuestionaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_questionaire')->insert([
            ['NamaJenis' => 'Speech/Komunikasi'],
            ['NamaJenis' => 'Sosialisasi'],
            ['NamaJenis' => 'Sensory/Kesadaran Kognitif'],
            ['NamaJenis' => 'Kesehatan/Fisik/Perilaku']
        ]);
    }
}
