<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarioempleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_empleado', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_empleado');  
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->unsignedBigInteger('id_inventario');  
            $table->foreign('id_inventario')->references('id')->on('inventarios');
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
        Schema::dropIfExists('inventario_empleado');
    }
}
