<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('NoInvoice');
            $table->string('NoIdentitas', 45);
            $table->integer('IdAnak');
            $table->date('TglInvoice');
            $table->integer('Bulan');
            $table->integer('Tahun');
            $table->double('SubTotal');
            $table->double('Potongan')->nullable();
            $table->double('GrandTotal');
            $table->double('JmlhPembayaran')->nullable();
            $table->date('TglExpire')->nullable();
            $table->double('Denda')->nullable();
            $table->integer('StatusPelunasan');
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
        Schema::dropIfExists('table_invoice');
    }
}
