<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsosPcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usos_pcs', function (Blueprint $table) {
            $table->id();
            $table->text('comentarios')->nullable();
            $table->boolean('en_uso');
            $table->date('fin_uso')->nullable();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('pc_id');
            $table->unsignedBigInteger('monitor_id');
            $table->foreign('monitor_id')->references('id')->on('monitores')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pc_id')->references('id')->on('pcs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('usos_pcs');
    }
}
