<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('NoIdentitas', 20)->primary();
            $table->integer('Role');
            $table->integer('IdTipe')->nullable();
            $table->string('Nama', 150);
            $table->string('Alamat', 350);
            $table->string('NoHP', 45);
            $table->integer('StatusAktif');
            $table->string('Username', 150)->unique();
            $table->string('Password', 350);
            $table->string('Email')->unique(); // Sesuaikan dengan kebutuhan Anda, atau hapus jika tidak diperlukan.
            $table->timestamp('email_verified_at')->nullable(); // Sesuaikan dengan kebutuhan Anda, atau hapus jika tidak diperlukan.
            $table->rememberToken(); // Sesuaikan dengan kebutuhan Anda, atau hapus jika tidak diperlukan.
            $table->timestamps(); // Sesuaikan dengan kebutuhan Anda, atau hapus jika tidak diperlukan.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
