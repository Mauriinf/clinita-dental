<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloqueDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //relacion de la tabla dia y bloque y usuario(doctor)
        Schema::create('bloque_dia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario');
            $table->foreign('id_usuario')->references('id')->on('users');//doctor
            $table->string('estado');
            $table->unsignedBigInteger('id_dia');
            $table->foreign('id_dia')->references('id')->on('dia');
            $table->unsignedBigInteger('id_bloque');
            $table->foreign('id_bloque')->references('id')->on('bloque');
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
        Schema::dropIfExists('bloque_dia');
    }
}
