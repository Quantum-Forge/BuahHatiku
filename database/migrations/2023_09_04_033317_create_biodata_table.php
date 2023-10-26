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
            $table->integer('AnakKe')->nullable();
            $table->string('TempatLahir', 100)->nullable();
            $table->date('TglLahir')->nullable();
            $table->string('Pendidikan', 45)->nullable();
            $table->integer('IdDiagnosa')->nullable();
            $table->string('KeteranganDiagnosa', 200)->nullable();
            $table->string('YangMendiagnosa', 100)->nullable();
            $table->integer('IdTerapis')->nullable();
            $table->string('NamaBapak', 100)->nullable();
            $table->string('NamaIbu', 100)->nullable();
            $table->date('TglLahirOrtu')->nullable();
            $table->string('Alamat', 200)->nullable();
            $table->string('NoHP', 45);
            $table->string('Email', 100)->nullable();
            $table->string('PendBapak', 45)->nullable();
            $table->string('PendIbu', 45)->nullable();
            $table->string('PekerjaanOrtu', 45)->nullable();
            $table->timestamps();
            $table->string('Photo', 200)->nullable();
            // ketika mendaftar biodata
            $table->date('TglMasuk')->nullable(); 
            // ketika terbit invoice 
            $table->date('TglKeluar')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
