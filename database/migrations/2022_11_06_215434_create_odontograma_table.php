<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdontogramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontograma', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_consulta');
            $table->foreign('id_consulta')->references('id')->on('consultas');
            $table->unsignedBigInteger('id_diente');
            $table->foreign('id_diente')->references('id')->on('dientes');
            $table->unsignedBigInteger('id_tratamiento');
            $table->foreign('id_tratamiento')->references('id')->on('tratamientos');
            $table->string('observacion');
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
        Schema::dropIfExists('odontograma');
    }
}
