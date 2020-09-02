<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $primaryKey = 'id_juego';
    protected $fillable = [
        'nombre',
        'precio_pc',
        'precio_xbox',
        'precio_ps',
        'sinopsis',
        'imagen',
        'generos_id_genero',
        'clasificaciones_id_clasificacion',
        'desarrolladoras_id_desarrolladora',
        'video'];
    public $timestamps = false;
}
