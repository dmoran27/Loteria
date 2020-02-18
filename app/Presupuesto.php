<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presupuesto extends Model
{
   use SoftDeletes;
    protected $table = 'presupuestos';
    protected $fillable = [
    	   'id_empleado',
    	   'entidadbancaria',
    	   'montototal',
           'montodisponible',
           'montoreservado',
    	   

       ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
       public function empleado()
    {
        return $this->BelongsToMany(Empleado::class);
    }
}
