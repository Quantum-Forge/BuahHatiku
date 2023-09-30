<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questionaire')->insert([
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa mengetahui nama sendiri?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa merespon pada kata "tidak" atau "berhenti"?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa mengikuti beberapa perintah?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa menggunakan satu kata?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa menggunakan 2 kata?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa menggunakan 3 kata?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa mengetahui 10 kata atau lebih?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa menggunakan kalimat dengan 4 kata atau lebih?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa menjelaskan apa yang diinginkan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa bertanya yang berarti?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak bisa menggunakan beberapa kalimat berurutan dengan benar?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 1,
                'Pertanyaan' => 'Apakah anak memiliki kemampuan yang normal (sesuai umur) dalam hal komunikasi?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak sepertinya berada dalam cangkang dan sulit dijangkau?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tampak tidak peduli pada orang lain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak perhatian atau hanya sedikit perhatian saat dipanggil?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak cenderung tidak kooperatif dan sering menolak?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak jarang membuat kontak mata?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak lebih suka ditinggal sendiri?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tampaknya tidak memiliki afeksi atau ekspresi emosi?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak bisa menyapa orang tua?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak sering menolak kontak dengan orang lain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak terlihat mengintimidasi?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak suka dipegang atau dipeluk?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak berbagi atau memperlihatkan benda-bendanya kepada orang lain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak belum bisa mengucapkan kata "da da"?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak sering tidak patuh atau suka menolak perintah?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak sering mengalami temper tantrum atau suka mengamuk?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak memiliki teman atau jarang berinteraksi sosial dengan teman sebaya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak jarang tersenyum?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak terlalu peka terhadap perasaan orang lain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak terlihat berbeda jika disukai atau disenangi oleh orang lain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 2,
                'Pertanyaan' => 'Apakah anak tidak terlalu bereaksi atau berbeda jika orang tua pergi atau meninggalkannya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak merespon saat dipanggil dengan namanya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak merespon dengan senang jika diberi pujian?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak menunjukkan minat pada orang dan binatang di sekitarnya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak bisa melihat dan menanggapi gambar (dan TV)?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak bisa menggambar, mewarnai, atau mengekspresikan diri melalui seni?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak dapat bermain dengan mainan secara benar?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak mengekspresikan wajah atau ekspresi yang sesuai dengan situasinya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak mengerti cerita yang disampaikan melalui TV?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak dapat mengerti penjelasan yang diberikan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak sadar akan lingkungan sekitarnya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak sadar akan bahaya di sekitarnya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak sering menunjukkan imajinasi dalam bermain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak bisa memulai aktivitas sendiri tanpa bantuan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak bisa berpakaian sendiri?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak memiliki rasa ingin tahu atau tertarik terhadap hal-hal baru?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak suka mengeksplorasi lingkungan sekitarnya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak cenderung fokus dan tidak terlalu melamun?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 3,
                'Pertanyaan' => 'Apakah anak melihat ke arah yang sama dengan orang-orang di sekitarnya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering ngompol di tempat tidur?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering pipis di celana?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering pup di celana?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering mengalami diare?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering mengalami konstipasi atau kesulitan buang air besar?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak cenderung makan terlalu banyak atau terlalu sedikit?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering mengalami kesulitan tidur?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak hanya menyukai jenis makanan tertentu dengan sangat sedikit variasi?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak terlihat sangat hiperaktif?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering mengalami letargi atau kelesuan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering memukul atau menyakiti diri sendiri?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering memukul atau menyakiti orang lain?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering merusak benda-benda di sekitarnya?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sangat sensitif terhadap suara?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak selalu terlihat cemas atau ketakutan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering tidak bahagia atau menangis tanpa alasan yang jelas?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak pernah mengalami kejang-kejang?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering berbicara secara obsesif tentang suatu topik atau hal tertentu?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak memiliki rutinitas yang sangat kaku dan tidak dapat diubah?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak suka berteriak atau membuat suara keras secara berlebihan?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak selalu ingin melakukan hal-hal yang sama tanpa variasi?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak terlihat tidak sensitif terhadap rasa sakit fisik?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sangat terfiksasi pada beberapa benda atau topik tertentu?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'IdJenis' => 4,
                'Pertanyaan' => 'Apakah anak sering melakukan pergerakan yang berulang atau gerakan khusus?',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
