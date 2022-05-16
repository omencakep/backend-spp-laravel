<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->bigIncrements('nisn');
            $table->string('nis');
            $table->string('nama');
            $table->unsignedBigInteger('id_kelas');
            $table->string('email');
            $table->string('password');
            $table->text('alamat');
            $table->string('no_telp');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
            // $table->id();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
