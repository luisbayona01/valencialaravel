<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evidencium
 *
 * @property $idevidencia
 * @property $file
 * @property $parteevidencia_id
 *
 * @property Parte $parte
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evidencia extends Model
{

    protected $table = 'evidencia';
     protected $primaryKey = 'idevidencia';
     public $timestamps = false;



    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['file','parteevidencia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parte()
    {
        return $this->hasOne('App\Models\Parte', 'id', 'parteevidencia_id');
    }


}
