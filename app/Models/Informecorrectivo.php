<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Informecorrectivo
 *
 * @property $id
 * @property $Codigo
 * @property $Concepto
 * @property $Uds_en_garantia
 * @property $Uds_en_conservacion
 * @property $Dias_en_conservacion
 * @property $Euros_por_dia
 * @property $Total
 * @property $Fecha_de_carga
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Informecorrectivo extends Model
{
      protected $table = 'informecorrectivo';
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
    protected $fillable = ['Codigo','Concepto','Uds_en_garantia','Uds_en_conservacion','Dias_en_conservacion','Euros_por_dia','Total','Fecha_de_carga'];



}
