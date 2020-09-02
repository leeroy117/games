<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.templateU');
});


Route::get('/administracion', function () {
    return view('layouts.template');
});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('administracion')->group(function () {
    Route::get('desarrolladoras', function () {
        // Matches The "/admin/users" URL
        return view('desarrolladoras');
    });
    Route::get('clasificaciones', function () {
        // Matches The "/admin/users" URL
        return view('clasificaciones');
    });
    Route::get('generos', function () {
        // Matches The "/admin/users" URL
        return view('generos');
    });
    Route::get('juegos', function () {
        // Matches The "/admin/users" URL
        return view('juegos');
    });
});


// Route::view('desarrolladoras','desarrolladoras');
// Route::view('clasificaciones','clasificaciones');
// Route::view('generos','generos');
Route::view('juegos', 'juegosU');

Route::get('/pdf_clasificaciones', 'PDFController@PDFClasificaciones');
Route::get('/pdf_desarrolladoras', 'PDFController@PDFDesarrolladoras');
Route::get('/pdf_generos', 'PDFController@PDFGeneros');
Route::get('/pdf_precio_juegos', 'PDFController@PDFPrecioJuegos');
Route::get('/pdf_juegos', 'PDFController@PDFJuegos');
