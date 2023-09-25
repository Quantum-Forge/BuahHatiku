<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicePengembalianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_pengembalian', function (Blueprint $table) {
            $table->bigIncrements('IdInvoicePengembalian');
            $table->integer('IdInvoice');
            $table->string('JenisAbsensi', 150);
            $table->double('Harga');
            $table->double('Durasi'); 
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
        Schema::dropIfExists('invoice_pengembalian');
    }
}
