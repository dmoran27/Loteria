<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes;
    protected $table = 'roles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'nombre',
    ];
    //observar cambios en la base de datos
public static function boot()
    {
        parent::boot();

        Rol::observe(new \App\Observers\UserActionsObserver);
    }
    
 public static function storeValidation($request)
    {
        return [
              'nombre' => [
                'required',
            ]      
        ];
    }
//validacion al actualizar
    public static function updateValidation($request)
    {
        return [
            'nombre' => [
                'required',
            ]
            
        ];
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'id' );
    }
}
