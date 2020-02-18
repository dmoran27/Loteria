<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoBeneficio extends Model
{
   use SoftDeletes;
    protected $table = 'tipobeneficios';
    protected $fillable = [
    	   'nombre',
           'descripcion',
    	   'requisitos',
          

       ];
protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];//
      public function solicitudes()
    {
        return $this->hasMany(Solicitud::class);
    }
    
}
