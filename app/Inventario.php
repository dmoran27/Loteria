<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
       use SoftDeletes; 
    protected $table = 'inventarios';
    protected $fillable = [
    	   'material',
           'cantidaddisponible',
           'cantidadreservado',
           'id_empleado',
    	   


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
}
