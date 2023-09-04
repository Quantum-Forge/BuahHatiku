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
            $table->string('NoIdentitas', 45);
            $table->string('Nama', 150);
            $table->integer('JenisKelamin');
            $table->integer('AnakKe');
            $table->string('TempatLahir', 100);
            $table->date('TglLahir');
            $table->integer('IdPend');
            $table->integer('IdDiagnosa');
            $table->integer('IdTerapis');
            $table->string('NamaBapa', 100);
            $table->string('NamaIbu', 100);
            $table->date('TglLahirOrtu');
            $table->string('Alamat', 200);
            $table->string('NoTelpon', 45);
            $table->string('NoHP', 45);
            $table->string('Email', 100);
            $table->string('PandBapak', 45);
            $table->string('PandIbu', 45);
            $table->string('PekerjaanOrtu', 45);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('biodata');
    }
}
