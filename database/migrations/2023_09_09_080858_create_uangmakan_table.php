<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangmakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uang_makan', function (Blueprint $table) {
            $table->id('IdUang'); // Kolom ID
            $table->string('NoIdentitas', 45); // Kolom NoIdentitas dengan tipe VARCHAR
            $table->double('Jumlah'); // Kolom Jumlah dengan tipe DOUBLE
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uangmakan');
    }
}
