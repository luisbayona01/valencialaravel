<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Parte
 *
 * @property $id
 * @property $id_localizacion
 * @property $idtipoparte
 * @property $creadopor
 * @property $fechacreacion
 * @property $reportadoPor
 * @property $fechareporte
 * @property $obscreadorparte
 * @property $asignadoA
 * @property $fechaAsignacion
 * @property $obsOperador
 * @property $validado_por
 * @property $fecha_validacion
 * @property $obscliente
 * @property $estadoparte_id
 *
 * @property Estadoparte $estadoparte
 * @property Localizacion $localizacion
 * @property Tipoparte $tipoparte
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Parte extends Model
{   
    protected $table = 'parte';
     protected $primaryKey = 'id';
     public $timestamps = false; 
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_localizacion','idtipoparte','creadopor','fechacreacion','reportadoPor','fechareporte','obscreadorparte','asignadoA','fechaAsignacion','obsOperador','validado_por','fecha_validacion','obscliente','estadoparte_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function estadoparte()
    {
        return $this->hasOne('App\Estadoparte', 'id', 'estadoparte_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function localizacion()
    {
        return $this->hasOne('App\Localizacion', 'id', 'id_localizacion');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoparte()
    {
        return $this->hasOne('App\Tipoparte', 'id', 'idtipoparte');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'creadopor');
    }
    

}
