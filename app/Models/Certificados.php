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
 * Class certificados
 *
 * @property $noCertificado
 * @property $mesCertificado
 * @property $penalidades
 * @property $totalCertificacion
 * @property $Val_LisConservacion
 * @property $anioCertificacion

 * @property Certificados[] $certificados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */

class Certificados extends Model
{
    protected $table = 'certificados';
     protected $primaryKey = 'id';
     public $timestamps = false;



     /**
      * Attributes that should be mass-assignable.
      *
      * @var array
      */
     protected $fillable = ['noCertificado', 'mesCertificado', 'penalidades', 'totalCertificacion', 'Val_LisConservacion', 'anioCertificacion'];

}
