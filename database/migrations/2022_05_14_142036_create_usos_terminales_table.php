<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsosTerminalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos_terminales', function (Blueprint $table) {
            $table->id();
            
            $table->text('comentarios')->nullable();
            $table->boolean('en_uso')->default(0);
            $table->date('fin_uso')->nullable();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('terminal_id');
            $table->unsignedBigInteger('sim_id');
            $table->foreign('sim_id')->references('id')->on('sims')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('terminal_id')->references('id')->on('terminales')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('usos_terminales');
    }
}
