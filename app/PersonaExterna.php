<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PersonaExterna extends Model
{
    //
     use SoftDeletes;
    protected $table = 'personas_externas';
    protected $fillable = [
    	   'id_proveedor',
    	   'id_tipobeneficio',
    	   'id_institucion',
    	   'id_natural',
    	   'nrosolicitud',
           'fechaexpediente',
           'descripcioncaso',
    	   'montopresupuesto',
           'montoaprobado',
           'estado',
           'fechadisponible',
           'fecharetiro',


       ];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
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
      public function solicitudes()
    {
        return $this->belongsToMany(Solicitud::class);
    }
    
}
