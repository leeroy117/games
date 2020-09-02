<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    //
    protected $table = 'clasificaciones';
    protected $primaryKey = 'id_clasificacion';
    protected $fillable = ['nombre'];
    public $timestamps = false;
}
