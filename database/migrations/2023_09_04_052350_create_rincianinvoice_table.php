<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRincianinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rincianinvoice', function (Blueprint $table) {
            $table->bigIncrements('IdRincian');
            $table->integer('NoInvoice');
            $table->integer('JenisTransaksi');
            $table->integer('IdTipe');
            $table->string('Hari', 350);
            $table->integer('JmlhPertemuan');
            $table->double('Harga');
            $table->double('Total');
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
        Schema::dropIfExists('rincianinvoice');
    }
}
