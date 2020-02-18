<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudEntidadExternaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_entidad_externa', function (Blueprint $table) {
               $table->unsignedBigInteger('id_solicitud');  
            $table->foreign('id_solicitud')->references('id')->on('solicitudes');
            $table->unsignedBigInteger('id_entidad_externa');  
            $table->foreign('id_entidad_externa')->references('id')->on('entidades_externas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud_entidad_externa');
    }
}
