<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->string('numero_sim');
            $table->string('pin')->nullable();
            $table->string('puk')->nullable();
            $table->text('comentarios')->nullable();
            $table->unsignedBigInteger('formato_sim_id');
            $table->unsignedBigInteger('linea_id');
            $table->foreign('linea_id')->references('id')->on('lineas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('formato_sim_id')->references('id')->on('formatos_sims')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('sims');
    }
}
