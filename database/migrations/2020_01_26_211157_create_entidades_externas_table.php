<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesExternasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades_externas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('tipodedocumento', ["J","G"]);
            $table->string('nroidentificacion');
            $table->string('razonsocial');   
            $table->string('telefono1')->nullable(); 
            $table->string('pais');
            $table->string('estado');
            $table->string('municipio');
            $table->string('parroquia');
            $table->text('direccion')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->softDeletes(); //Nueva línea, para el borrado lógico
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidades_externas');
    }
}
