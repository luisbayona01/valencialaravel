<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estadoparte
 *
 * @property $id
 * @property $estadoparte
 *
 * @property Parte[] $partes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estadoparte extends Model
{


    protected $table = 'estadoparte';
     protected $primaryKey = 'id';
     public $timestamps = false;




    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['estadoparte'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partes()
    {
        return $this->hasMany('App\Parte', 'estadoparte_id', 'id');
    }


}
