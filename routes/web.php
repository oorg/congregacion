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

Route::get('/', function () {
    return redirect()->route('integrantes.index');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::resource('cartas', 'CartasController');
Route::get('actividades/integrantes/{id}', 'ActividadController@intindex')->name('actividades.integrantes.index');
Route::get('actividades/grupos/{id}', 'ActividadController@grpindex')->name('actividades.grupos.index');
Route::post('actividades/create', 'ActividadController@create')->name('actividades.create');
Route::resource('actividades', 'ActividadController')->except('create')->middleware('verified');;

Route::get('nombramientos/{integrante}/{grupo}', 'NombramientoController@agrega')->name('nombramientos.agrega')->middleware('auth', 'user');
Route::post('nombramientos/create', 'NombramientoController@create')->name('nombramiento.create');
Route::get('/integrantes/create/{grupo}', 'IntegranteController@create')->name('integrantes.create');
Route::get('/integrantes/edit/{integrante}/{grupo}', 'IntegranteController@edit')->name('integrantes.edit');
Route::resource('integrantes', 'IntegranteController')->except('create', 'edit');
//Route::match(['get', 'post'], '/grupo-create', 'GrupoController@create')->name('grupo.create');
Route::resource('grupos', 'GrupoController');//->middleware('auth', 'user');
