<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solicitud extends Model
{
   use SoftDeletes;
    protected $table = 'solicitudes';
    protected $fillable = [
    	   'id_proveedor',
    	   'id_tipobeneficio',
    	   'id_organizacion',
    	   'id_natural',
    	   'nrosolicitud',
           'fechaexpediente',
           'descripcioncaso',
    	   'montopresupuesto',
           'montoaprobado',
           'estado',
           'fechadisponible',
           'fecharetiro',


       ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      public function empleados()
    {
        return $this->BelongsToMany(Empleado::class);
    }

      public function natural()
    {
        return $this->BelongsTo(Natural::class);
    }

     public function organizacion()
    {
        return $this->BelongsTo(Organizacion::class);
    }
    public function proveedor()
    {
        return $this->BelongsTo(Proveedor::class);
    }
     public function tipoBeneficio()
    {
        return $this->BelongsToMany(TipoBeneficios::class);
    }
     public function entidadExterna()
    {
        return $this->BelongsToMany(EntidadExterna::class);
    }
     public function personaExterna()
    {
        return $this->BelongsToMany(PersonaExterna::class);
    }
     public function estado()
    {
        return $this->BelongsTo(Estado::class);
    }
}
