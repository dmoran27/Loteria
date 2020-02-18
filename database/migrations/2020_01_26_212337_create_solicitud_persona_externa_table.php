<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudPersonaExternaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_persona_externa', function (Blueprint $table) {
              $table->unsignedBigInteger('id_solicitud');  
            $table->foreign('id_solicitud')->references('id')->on('solicitudes');
            $table->unsignedBigInteger('id_persona_externa');  
            $table->foreign('id_persona_externa')->references('id')->on('personas_externas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_persona_externa');
    }
}
