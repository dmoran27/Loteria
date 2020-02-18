<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_externas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipodedocumento', ["V","E"]);
            $table->string('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fechanacimiento');
            $table->string('genero');
            $table->string('telefono1')->nullable();
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->string('parroquia');
            $table->text('direccion')->nullable();
            $table->string('email')->nullable();
             $table->softDeletes(); //Nueva línea, para el borrado lógico
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
        Schema::dropIfExists('personas_externas');
    }
}
