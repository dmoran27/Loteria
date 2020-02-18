<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_disponibilidad');  
            $table->foreign('id_disponibilidad')->references('id')->on('disponibilidades');
            $table->unsignedBigInteger('id_organizacion')->nullable();  
            $table->foreign('id_organizacion')->references('id')->on('organizaciones');
            $table->unsignedBigInteger('id_natural')->nullable();  
            $table->foreign('id_natural')->references('id')->on('naturales');
            $table->string('estado');
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
        Schema::dropIfExists('citas');
    }
}
