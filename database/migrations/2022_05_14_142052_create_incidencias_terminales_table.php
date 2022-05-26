<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTerminalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias_terminales', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->text('comentarios')->nullable();
            $table->text('conclusion')->nullable();
            $table->unsignedBigInteger('uso_terminal_id');
            $table->foreign('uso_terminal_id')->references('id')->on('usos_terminales')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('incidencias_terminales');
    }
}
