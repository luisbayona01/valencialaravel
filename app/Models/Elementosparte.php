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


   

}
