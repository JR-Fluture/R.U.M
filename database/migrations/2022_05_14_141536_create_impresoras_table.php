<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpresorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impresoras', function (Blueprint $table) {
            $table->id();
            $table->string('marca');
            $table->string('modelo');
            $table->string('tinta_original')->nullable();
            $table->string('tinta_alternativo')->nullable();
            $table->boolean('es_wifi')->default(0);
            $table->boolean('color')->default(0);
            $table->boolean('red')->default(0);
            $table->boolean('es_multifuncion')->default(0);
            $table->string('numero_serie')->nullable();
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
        Schema::dropIfExists('impresoras');        
    }
}
