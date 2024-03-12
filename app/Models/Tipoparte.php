<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipoparte
 *
 * @property $id
 * @property $nombre
 *
 * @property Parte[] $partes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipoparte extends Model
{
     protected $table = 'tipoparte';
     protected $primaryKey = 'id';
  

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partes()
    {
        return $this->hasMany('App\Parte', 'idtipoparte', 'id');
    }
    

}
