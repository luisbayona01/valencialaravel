<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Penalidades
 *
 * @property $idpenalidad
 * @property $fechaCreacion
 * @property $creadoPor
 * @property $obsCreacion
 * @property $valorPenalidad4
 * @property $estadopenalidad_Id
 * @property $tipoPenalidad
 * @property $penalidadEnCertificado
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Penalidades extends Model
{
    protected $table = 'penalidades';
     protected $primaryKey = 'idpenalidad';
     public $timestamps = false;

    static $rules = [
		'idpenalidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['creadoPor','fechaCreacion','valorPenalidad4','obsCreacion','obsCreacion', 'tipoPenalidad', 'operaciones', 'penalidadEnCertificado'];



}
