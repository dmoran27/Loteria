<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolpermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permiso', function (Blueprint $table) {
            
              $table->unsignedBigInteger('id_permiso');  
            $table->foreign('id_permiso')->references('id')->on('permisos');
            $table->unsignedBigInteger('id_rol');  
            $table->foreign('id_rol')->references('id')->on('roles');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol_permiso');
    }
}
