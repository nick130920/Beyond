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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Vistas Usuario Profesor
Route::middleware(['auth', 'teacher'])->prefix('/teacher')->namespace('Teacher')->group(function(){
  // Route::get('/','TeacherController@index') //home Teacher7
  Route::view('/','teacher');
  Route::get('/class', 'ClassController@index'); //listado
  Route::get('/class/create', 'ClassController@create'); //Creacion de classo
  Route::post('/class', 'ClassController@store'); //registrar
  Route::get('/class/{id}/edit', 'ClassController@edit'); //formulario edición
  Route::post('/class/{id}/edit', 'ClassController@update'); //Actualizar producto
  Route::delete('/class/{id}', 'ClassController@destroy'); //Eliminar producto

  Route::get('/class/{id}/resource', 'ResourceController@index'); //listado
  Route::post('/class/{id}/resource', 'ResourceController@store'); //registrar
  Route::delete('/class/{id}/resource', 'ResourceController@destroy'); //Eliminar Resource
  Route::get('/class/{id}/resource/select/{resource}', 'ResourceController@select'); //Destacar resource
});
