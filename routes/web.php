<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::group(['prefix' => 'api'], function () {
    //Route::get('/publicaciones', 'PublicacionesController@index');
    //Route::get('/publicaciones/{publicacion}', 'PublicacionesController@show');
    //Route::put('/publicaciones/{publicacion}', 'PublicacionesController@update');
    //Route::delete('/publicaciones/{publicacion}', 'PublicacionesController@destroy');
    //Route::post('/publicaciones', 'PublicacionesController@store');
    Route::apiResource('/publicaciones', 'PublicacionesController');
    Route::apiResource('/paises', 'PaisesController');
    Route::apiResource('/categorias', 'CategoriasController');
});

Route::get('/', function () {
    return "main";
});
