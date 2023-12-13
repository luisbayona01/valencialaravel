<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Descripcionelementos extends Model
{
    protected $table = 'descripcionelementos';
     protected $primaryKey = 'id';
     public $timestamps = false;
    static $rules = [
    ];

    //protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['elemento', 'ud', 'descripcion', 'precio'];


   

}
