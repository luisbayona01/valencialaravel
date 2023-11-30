<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Localizacion
 *
 * @property $id
 * @property $cod_localizacion
 * @property $descripcion
 * @property $zona
 *
 * @property Parte[] $partes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Localizacion extends Model
{
    protected $table = 'localizacion';
     protected $primaryKey = 'id';    


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cod_localizacion','descripcion','zona'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partes()
    {
        return $this->hasMany('App\Parte', 'id_localizacion', 'id');
    }
    

}
