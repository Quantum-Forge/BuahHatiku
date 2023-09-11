<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataTable extends Migration
{
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table ) {
            $table->bigIncrements('IdAnak');
            $table->string('NoIdentitas', 45)->nullable();
            $table->string('Nama', 150);
            $table->string('JenisKelamin', 10);
            $table->integer('AnakKe');
            $table->string('TempatLahir', 100);
            $table->date('TglLahir');
            $table->string('Pendidikan', 45);
            $table->integer('IdDiagnosa')->nullable();
            $table->string('KeteranganDiagnosa', 200)->nullable();
            $table->string('YangMendiagnosa', 100)->nullable();
            $table->integer('IdTerapis')->nullable();
            $table->string('NamaBapak', 100);
            $table->string('NamaIbu', 100);
            $table->date('TglLahirOrtu');
            $table->string('Alamat', 200);
            $table->string('NoHP', 45);
            $table->string('Email', 100);
            $table->string('PendBapak', 45);
            $table->string('PendIbu', 45);
            $table->string('PekerjaanOrtu', 45)->nullable();
            $table->timestamps();
            $table->string('Photo', 200)->nullable();
            $table->date('TglMasuk')->nullable();
            $table->date('TglKeluar')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
