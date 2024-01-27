<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Elementosparte extends Model
{
    protected $table = 'elemtos_parte';
     protected $primaryKey = 'idelementos_parte';
     public $timestamps = false;
    static $rules = [
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad', 'precio_total', 'parteid', 'elementosd_id'];

  public function descripcionelemento()
    {
        return $this->hasOne('App\Models\Descripcionelemento', 'id', 'elementosd_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parte()
    {
        return $this->hasOne('App\Models\Parte', 'id', 'parteid');
    }



}
