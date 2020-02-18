<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cita extends Model
{
    //
      use SoftDeletes;
    protected $table = 'citas';
    protected $fillable = [
    	   'id_disponibilidad',
    	   'id_institucion',
    	   'id_natural',
         'estado'
       ];


   protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      public function disponibilidad()
    {
        return $this->belongsTo(disponibilidad::class);
    }
     public function institucion()
    {
        return $this->belongsTo(Institucion::class);
    }
     public function natural()
    {
        return $this->belongsTo(Natural::class);
    }
}
