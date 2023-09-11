<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentalquestionaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parental_questionaire', function (Blueprint $table) {
            $table->bigIncrements('IdParental');
            $table->integer('IdAnak');
            $table->integer('IdQuestionaire');
            $table->string('Jawaban', 350);
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
        Schema::dropIfExists('parentalquestionaire');
    }
}
