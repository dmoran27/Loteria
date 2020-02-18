<?php
namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AccionUsuario
 *
 * @package App
 * @property string $user_id
 * @property string $accion
 * @property string $modeloafectado
 * @property integer $idafectado
*/
class AccionUsuario extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'accion',
        'modeloafectado',
        'idafectada',
        'user_id']; 
 
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
           
    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
