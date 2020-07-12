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
  Route::get('/','TeacherController@index')->name('teacher'); //home Teacher

  Route::get('/class','ClassController@index')->name('class');//Vistas de las clases
  Route::get('/class/create', 'ClassController@create')->name('/create/class'); //Creacion de class
  Route::post('/class', 'ClassController@store')->name('/class/store'); //registrar la creación
  Route::get('/class/{id}/edit', 'ClassController@edit'); //formulario edición
  Route::post('/class/{id}/edit', 'ClassController@update'); //Actualizar producto
  Route::delete('/class/{id}', 'ClassController@destroy'); //Eliminar producto

});
Route::middleware(['auth'])->group(function(){
  Route::get('/{id}/profile', 'ProfileController@index'); //listado
  Route::post('/{id}/profile', 'ProfileController@store'); //registrar
  Route::delete('/{id}/profile', 'ProfileController@destroy'); //Eliminar Resource
});
