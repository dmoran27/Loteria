<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
   use SoftDeletes;
    protected $table = 'proveedores';
    protected $fillable = [
    	   'tipodedocumento',
    	   'nroidentificacion',
           'razonsocial',
           'telefono1',
    	   'telefono2',
           'direccion',
           'email',


       ];

	protected $tipodedocumento = ['J', 'G'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
    
    public function Municipio()
    {
        return $this->hasOne(Municipip::class, 'id','municipio_id');
    }
    public function Estado()
    {
        return $this->hasOne(Estado::class,'id', 'estado_id');
    }
    public function Parroquia()
    {
        return $this->hasOne(Parroquia::class, 'id', 'parroquia_id');
    }
}
