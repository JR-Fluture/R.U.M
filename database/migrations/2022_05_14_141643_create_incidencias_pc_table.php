<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasPcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias_pcs', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->text('comentarios')->nullable();
            $table->text('conclusion')->nullable();
            $table->unsignedBigInteger('uso_pc_id');
            $table->foreign('uso_pc_id')->references('id')->on('usos_pcs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('incidencias_pcs');
    }
}
