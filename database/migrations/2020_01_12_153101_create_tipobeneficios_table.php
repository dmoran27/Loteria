<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipobeneficiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipobeneficios', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->string('nombre');
            $table->text('descripcion')->nullable();;
             $table->text('requisitos');
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
        Schema::dropIfExists('tipobeneficios');

    }
}
