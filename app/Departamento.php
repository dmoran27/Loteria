<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
     use SoftDeletes;
    protected $table = 'departamentos';
    protected $fillable = [
           'nombre',
           'descripcion',
    ];

    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
      public function empleado()
    {
        return $this->hasOne(Empleado::class, 'tipo_id');
    }
}
