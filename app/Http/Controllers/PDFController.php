<?php

namespace App\Http\Controllers;

use DB;
use App\Juego;
use App\Clasificacion;
use App\Genero;
use App\Desarrolladora;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function PDFClasificaciones()
    {
        $clasificaciones = Clasificacion::all();
        $date = \Carbon\Carbon::now();
        $date->toDateTimeString();
        $pdf = \PDF::loadView('reportes.clasificaciones', ['clasificaciones' => $clasificaciones]);
        return $pdf->stream('clasificaciones' . $date . '.pdf');
    }

    public function PDFDesarrolladoras()
    {
        $desarrolladoras = Desarrolladora::all();
        $date = \Carbon\Carbon::now();
        $date->toDateTimeString();
        $pdf = \PDF::loadView('reportes.desarrolladoras', ['desarrolladoras' => $desarrolladoras]);
        return $pdf->stream('desarrolladoras' . $date . '.pdf');
    }

    public function PDFGeneros()
    {
        $generos = Genero::all();
        $date = \Carbon\Carbon::now();
        $date->toDateTimeString();
        $pdf = \PDF::loadView('reportes.generos', ['generos' => $generos]);
        return $pdf->stream('generos' . $date . '.pdf');
    }

    public function PDFPrecioJuegos()
    {
        $juegos = DB::table('vJuegos')->get();
        $date = \Carbon\Carbon::now();
        $date->toDateTimeString();
        $pdf = \PDF::loadView('reportes.precio_juegos', ['juegos' => $juegos]);
        return $pdf->stream('listado_precio_juegos' . $date . '.pdf');
    }

    public function PDFJuegos()
    {
        $juegos = DB::table('vJuegos')->get();
        $date = \Carbon\Carbon::now();
        $date->toDateTimeString();
        $pdf = \PDF::loadView('reportes.juegos', ['juegos' => $juegos]);
        return $pdf->stream('juegos' . $date . '.pdf');
    }
}
