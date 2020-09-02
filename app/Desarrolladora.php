<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desarrolladora extends Model
{
    //
   protected $primaryKey = 'id_desarrolladora';
   public $timestamps = false;
   protected $fillable = ['nombre'];

}
