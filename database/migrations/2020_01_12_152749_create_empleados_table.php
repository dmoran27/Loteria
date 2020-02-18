<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');  
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_departamento');  
            $table->foreign('id_departamento')->references('id')->on('departamentos');
            $table->enum('tipodedocumento', ["V","E"]);
            $table->string('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fechanacimiento');
            $table->string('genero');
            $table->string('cargo');
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
        Schema::dropIfExists('empleados');
    }
}
