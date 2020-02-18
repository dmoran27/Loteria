<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_proveedor')->nullable(); 
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->unsignedBigInteger('id_tipobeneficio');  
            $table->foreign('id_tipobeneficio')->references('id')->on('tipobeneficios');
            $table->unsignedBigInteger('id_organizacion')->nullable();  
            $table->foreign('id_organizacion')->references('id')->on('organizaciones');
            $table->unsignedBigInteger('id_natural')->nullable();  
            $table->foreign('id_natural')->references('id')->on('naturales'); 
            $table->integer('nrosolicitud')->nullable();
            $table->dateTime('fechaexpediente')->nullable();
            $table->string('descripcioncaso')->nullable();            
            $table->decimal('montopresupuesto')->nullable();
            $table->decimal('montoaprobado')->nullable();
            $table->string('estado');
            $table->dateTime('fechadisponible')->nullable();
            $table->dateTime('fecharetiro')->nullable();
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
        Schema::dropIfExists('solicitudes');
    }
}
