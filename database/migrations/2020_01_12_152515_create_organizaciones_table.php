<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');  
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_tipoorganizacion');  
            $table->foreign('id_tipoorganizacion')->references('id')->on('tipo_organizaciones');
            $table->enum('tipodedocumento', ["J","G"]);
            $table->string('nroidentificacion');
            $table->string('razonsocial');            
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
        Schema::dropIfExists('organizaciones');
    }
}
