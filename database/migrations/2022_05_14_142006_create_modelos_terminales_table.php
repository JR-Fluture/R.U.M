<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTerminalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos_terminales', function (Blueprint $table) {
            $table->id();
            $table->string('modelo');
            $table->string('sistema_operativo')->nullable();
            $table->string('version_sistema_operativo')->nullable();
            $table->boolean('es_doble_sim')->default(0);
            $table->integer('ram')->nullable();
            $table->integer('almacenamiento_interno')->nullable();
            $table->string('tiene_almacenamiento_externo')->nullable();
            $table->integer('almacenamiento_externo')->nullable();
            $table->integer('px_camara_trasera')->nullable();
            $table->integer('px_camara_frontal')->nullable();
            $table->integer('num_puertos_rj_45')->nullable();
            $table->boolean('tiene_wifi')->default(0);
            $table->boolean('es_punto_acceso')->default(0);
            $table->text('comentario')->nullable();
            $table->unsignedBigInteger('tipo_terminal_id');
            $table->unsignedBigInteger('marca_terminal_id');
            $table->unsignedBigInteger('tipo_cargador_id');
            $table->foreign('tipo_cargador_id')->references('id')->on('tipos_cargadores')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('marca_terminal_id')->references('id')->on('marcas_terminales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tipo_terminal_id')->references('id')->on('tipos_terminales')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('modelos_terminales');
    }
}
