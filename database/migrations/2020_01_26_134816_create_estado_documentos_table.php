<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_documentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_solicitud');  
            $table->foreign('id_solicitud')->references('id')->on('solicitudes'); 
            $table->enum('recepcion_documentos', ["Si","No"]);  
            $table->enum('estado_documentos',  ["Aceptado","Negado"]);  
            $table->enum('presidencia', ["Aceptado","Negado"]);  
            $table->enum('presupuesto',  ["Aceptado","Negado"]); 
            $table->enum('administracion',  ["Aceptado","Negado"]); 
            $table->enum('aprobacion_final',  ["Aceptado","Negado"]);  
            $table->enum('disponible',  ["Si","No"]);  
            $table->enum('retiro', ["Si","No"]);    
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
        Schema::dropIfExists('estado_documentos');
    }
}
