<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminales', function (Blueprint $table) {
            $table->id();
            $table->string('imei_1')->nullable();
            $table->string('imei_2')->nullable();
            $table->string('numero_serie')->nullable();
            $table->text('comentarios')->nullable();
            $table->unsignedBigInteger('modelo_terminal_id');
            $table->foreign('modelo_terminal_id')->references('id')->on('modelos_terminales')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('terminales');
    }
}
