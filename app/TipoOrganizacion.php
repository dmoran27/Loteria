<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TipoOrganizacion extends Model
{
    //


    protected $table = 'tipo_organizaciones';
    protected $fillable = [
    	   'nombre',
       ];
protected $dates = [
        'created_at',
        'updated_at',
        
    ];



}
