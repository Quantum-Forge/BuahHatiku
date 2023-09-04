<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->bigIncrements('IdAbsensi');
            $table->date('Tanggal');
            $table->string('NoIdentitas', 100);
            $table->integer('IdTipe');
            $table->string('Hari', 350);
            $table->integer('IdAnak');
            $table->integer('Hadir');
            $table->string('Alasan', 400)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi');
    }
}
