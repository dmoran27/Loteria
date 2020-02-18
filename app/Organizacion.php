<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizacion extends Model
{
    //
     //
     use SoftDeletes; 
    //columnas de la tabla clientes
    protected $table = 'organizaciones';
    protected $fillable = [
           'razonsocial',
           'tipodedocumento',
           'id_user',
           'nroidentificacion',
           'id_tipoorganizacion',

             
    ];

    protected $tipodedocumento = ['J', 'G'];
    protected $dates = ['deleted_at'];



      public function users()
    {
        return $this->BelongsTo(User::class);
    }
      public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
    public function citas()
    {
        return $this->hasMany(cita::class);
    }
}
