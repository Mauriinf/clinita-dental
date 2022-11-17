<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaDentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('users');
            $table->unsignedBigInteger('id_doctor');
            $table->foreign('id_doctor')->references('id')->on('users');
            $table->string('diagnostico')->nullable();
            $table->string('medicamentos')->nullable();
            $table->date('fecha_creacion');
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->string('alergias')->nullable();
            $table->string('enfermedades')->nullable();
            $table->string('estado');
            $table->decimal('costo_total',8,2)->default('0');
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
        Schema::dropIfExists('ficha_dental');
    }
}
