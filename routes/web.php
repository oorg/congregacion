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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::resource('cartas', 'CartasController');
Route::resource('actividades', 'ActividadController');
Route::get('/integrantes/create/{grupo}', 'IntegranteController@create')->name('integrantes.create');
Route::get('/integrantes/edit/{integrante}/{grupo}', 'IntegranteController@edit')->name('integrantes.edit');
Route::resource('integrantes', 'IntegranteController')->except('create', 'edit');
//Route::match(['get', 'post'], '/grupo-create', 'GrupoController@create')->name('grupo.create');
Route::resource('grupos', 'GrupoController');//->middleware('auth', 'user');
