<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestoempleadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuesto_empleado', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('id_empleado');  
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->unsignedBigInteger('id_presupuesto');  
            $table->foreign('id_presupuesto')->references('id')->on('presupuestos');
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
        Schema::dropIfExists('presupuesto_empleado');
    }
}
