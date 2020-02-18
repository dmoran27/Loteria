<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Disponibilidad extends Model
{
    use SoftDeletes;
    protected $table = 'disponibilidades';
    protected $fillable = [
    	   'fecha',
           'horainicio',
           'horafin',
             
    ];

    
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     public function cita()
    {
        return $this->hasOne(Cita::class);
    }
}
