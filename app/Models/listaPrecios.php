<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ListaPrecios
 *
 * @property $id
 * @property $elemento
 * @property $ud
 * @property $descripcion
 * @property $precio
 * @property $Fecha_de_carga



 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ListaPrecios extends Model
{
    protected $table = 'descripcionelementos';
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
    protected $fillable = ['elemento','ud','descripcion','precio','Fecha_de_carga'];
}
