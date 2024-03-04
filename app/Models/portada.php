<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class portada
 *
 * @property $anoCertificado
 * @property $mesVigente
 * @property $AnoVigente
 * @property $contratista
 * @property $contactoContratista
 * @property $ubicacion
 * @property $obra
 * @property $fechaInicioContrato
 * @property $plazoejecucion
 * @property $iva
 * @property $bajaobtenida
 * @property $fechaAdjudicacion
 * @property $beneficioind
 * @property $gastosgenerales
 * @property $ejec_anteriores
 * @property $imgportada
 *
 * @property Portada[] $portada
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class portada extends Model
{
    protected $table = 'portada';
    //protected $primaryKey = 'id';
    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['anoCertificado', 'AnoVigente', 'mesVigente', 'contratista', 'contactoContratista', 'ubicacion', 'obra', 'fechaInicioContrato', 'iva', 'bajaobtenida', 'fechaAdjudicacion', 'beneficioind', 'gastosgenerales', 'plazoejecucion', 'ejec_anteriores', 'imgportada'];
}
