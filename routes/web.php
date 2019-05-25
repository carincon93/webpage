<?php

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

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/servicio/{servicioTitulo}', 'WelcomeController@getServicio')->name('servicio');
Route::get('/empresa/{tipoInformacion}', 'WelcomeController@getInformacion')->name('informacionEmpresa');

Route::group(['prefix' => 'panel', 'middleware' => ['auth']], function() {
    Route::get('/', 'PanelController@index')->name('panel');
    Route::resource('/imagenes', 'ImagenController');
    Route::resource('/logos', 'LogoController');
    Route::resource('/servicios', 'ServicioController');
    Route::resource('/informaciones', 'InformacionController');
});
