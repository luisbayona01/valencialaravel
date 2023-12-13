<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

//use  Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
Use DB;
class User extends Authenticatable
{
    use   HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $email
 * @property $username
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $empresaid
 * @property $created_at
 * @property $updated_at
 * @property $idrol
 *
 * @property Parte[] $partes
 * @property Role $role
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */



    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','email','idrol','password'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partes()
    {
        return $this->hasMany('App\Parte', 'creadopor', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'idrol');
    }
      public function rolname()
    {    //$var="hola";
       $idrol= \Illuminate\Support\Facades\Auth::user()->idrol;
       $roname= DB::table('roles')->select('name')->where('id', '=', $idrol)->first();
       return $roname->name;
    }


}
