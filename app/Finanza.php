<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Finanza extends Model
{
    //
	protected $table = 'finanzas';
    protected $fillable = [
    	  
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
