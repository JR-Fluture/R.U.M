<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpresoraPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impresora_persona', function (Blueprint $table) {
            $table->unsignedBigInteger('persona_id');
            $table->foreign('persona_id')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('impresora_id');
            $table->foreign('impresora_id')->references('id')->on('impresoras')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->primary(['impresora_id','persona_id'],
                    'persona_has_impresora_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impresora_persona');
    }
}
