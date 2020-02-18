<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Natural extends Model
{
   use SoftDeletes;
    protected $table = 'naturales';
    protected $fillable = [
    	   'id_user',
    	   'tipodedocumento',
    	   'cedula',
           'nombre',
           'apellido',
    	   'fechanacimiento',
           'genero',
           


       ];

	protected $tipodedocumento = ['V', 'E'];
    protected $dates = ['deleted_at'];//

      public function user()
    {
        return $this->belongsTo(User::class);
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
