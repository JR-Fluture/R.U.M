<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcs', function (Blueprint $table) {
            $table->id();
            $table->string('microprocesador');
            $table->string('placa_base');
            $table->string('tipo_ram')->nullable();
            $table->integer('ram')->nullable();
            $table->string('tipo_almacenamiento')->nullable();
            $table->integer('capacidad_almacenamiento')->nullable();
            $table->string('tipos_conector')->nullable();
            $table->string('sistema_operativo')->nullable();
            $table->boolean('activacion')->default(0);
            $table->string('numero_inventario')->nullable();
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('pcs');
    }
}
