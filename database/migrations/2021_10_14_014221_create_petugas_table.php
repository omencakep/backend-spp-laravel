<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();
            $table->bigIncrements('id_petugas');
            // $table->string('username');
            // $table->string('password');
            $table->string('nama_petugas');
            $table->text('alamat');
            $table->string('no_telp');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
