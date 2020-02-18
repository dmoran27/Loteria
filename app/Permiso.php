<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Permiso extends Model
{
    //
     use SoftDeletes;
    protected $table = 'permisos';
    protected $fillable = [
	              'id',
           'nombre',
           'slug',

       ];
   protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public static function boot()
    {
        parent::boot();

        Permiso::observe(new \App\Observers\UserActionsObserver);
    }
}
