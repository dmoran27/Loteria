<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
   use SoftDeletes;
    protected $table = 'empleados';
    protected $fillable = [
    	  'id_departamento',
    	  'tipodedocumento',
    	  'cedula',
        'nombre',
        'apellido',
    	  'fechanacimiento',
        'genero',
        'cargo',


       ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      public function users()
    {
        return $this->belongsTo(User::class);
    }
      public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
      public function solicitudes()
    {
        return $this->belongsToMany(Solicitud::class);
    }
      public function invenarios()
    {
        return $this->belongsToMany(Invenario::class);
    }
      public function presupuestos()
    {
        return $this->belongsToMany(Presupuesto::class);
    }
     public function finanzas()
    {
        return $this->belongsToMany(Finanzas::class);
    }
    

}
