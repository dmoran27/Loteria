<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class EntidadExterna extends Model
{
    //
     use SoftDeletes; 
    //columnas de la tabla clientes
    protected $table = 'entidades_externas';
    protected $fillable = [
         
    ];

    protected $dates = ['deleted_at'];





}
