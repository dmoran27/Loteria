<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    protected $fillable = [
        'email', 
        'password',
        'direccion',
        'telefono1',
        'telefono2',
        'estado_id',
        'municipio_id',
        'parroquia_id',
    ];
protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static function boot()
    {
        parent::boot();
        User::observe(new \App\Observers\UserActionsObserver);
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'id', 'empleado_id');
    }

     public function institucion()
    {
        return $this->hasOne(Institucion::class, 'id', 'institucion_id');
    }

     public function natural()
    {
        return $this->hasOne(Natural::class, 'id', 'natural_id');
    }
     public function roles()
    {
        return $this->belongsToMany(Rol::class, 'rol_user', 'id_users', 'id_rol');
    }
     public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'permiso_user', 'id_users', 'id_permiso');
    }
    public function Municipio()
    {
        return $this->hasOne(Municipip::class, 'id','municipio_id');
    }
    public function Estado()
    {
        return $this->hasOne(Estado::class,'id', 'estado_id');
    }
    public function Parroquia()
    {
        return $this->hasOne(Parroquia::class, 'id', 'parroquia_id');
    }

    
}
