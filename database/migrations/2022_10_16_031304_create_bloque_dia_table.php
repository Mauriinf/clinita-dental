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
            $table->id();
            $table->integer('id_usuario');//doctor
            $table->string('estado');
            $table->integer('id_dia');
            $table->integer('id_bloque');
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
