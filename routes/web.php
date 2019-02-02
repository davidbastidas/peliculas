<?php

use \Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        if (isset(\Illuminate\Support\Facades\Auth::user()->id)) {
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/peliculas/existencia', 'PeliculasController@existencia')->name('existencia');
    Route::get('/peliculas/agregar/index', 'PeliculasController@agregarIndex')->name('agregarIndex');
    Route::post('/peliculas/agregar', 'PeliculasController@agregarPelicula')->name('pelicula.agregar');
    Route::get('/peliculas', 'PeliculasController@index')->name('pelicula');
    Route::get('/pelicula/reservar/{id}', 'PeliculasController@reservar')->name('pelicula.reservar');
});
