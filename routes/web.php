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
  Route::get('/classes','ClassController@index')->name('/teacher/classes');//Vistas de las clases Profesor
  Route::get('/class/create', 'ClassController@create')->name('/create/class'); //Creacion de class
  Route::post('/class', 'ClassController@store')->name('/class/store'); //registrar la creación
  Route::get('/class/{id}', 'ClassController@class'); //UNA CLASE
  Route::get('/class/{id}/edit', 'ClassController@edit'); //formulario edición
  Route::post('/class/{id}/edit', 'ClassController@update'); //Actualizar clase
  Route::delete('/class/{id}', 'ClassController@destroy'); //Eliminar clase

  ///////////NOVEDADES CLASE///////////////////
  Route::post('/class/{id}/novelty', 'ClassController@novelty'); //UNA CLASE
  //////////TAREAS CLASE//////////////////////
  Route::get('/homework', 'ClassController@homework'); //Vista creacion de tareas
  //////////MATERIAL CLASE//////////////////////
  Route::get('/material', 'ClassController@material'); //Vista creacion de material
  //////////CALIFICACIONES CLASE//////////////////////
  Route::get('/ratings', 'ClassController@ratings'); //Vista de calificaciones
  //////////ESTUDIANTES CLASE//////////////////////
  Route::get('/students', 'ClassController@students'); //Vista de estudiantes


});
Route::middleware(['auth', 'student'])->prefix('/student')->namespace('Student')->group(function(){
  Route::get('/','StudentController@index')->name('student'); //home student
  Route::post('/','StudentController@join')->name('join'); //unirse a clase
  Route::get('/classes','ClassController@classes')->name('/student/classes');//Vistas de las clases
  Route::get('/class/{id}','ClassController@class')->name('/student/class');//Clase

});
Route::middleware(['auth'])->group(function(){
  Route::get('/profile', 'ProfileController@index')->name('profile'); //listado
  Route::get('/edit/profile', 'ProfileController@edit')->name('/edit/profile'); //editar
  Route::post('/edit/profile', 'ProfileController@update')->name('/edit/profile/update'); //actualizar
  Route::get('/edit/profile/password', 'ProfileController@editPassword')->name('/edit/profile/password'); //editar
  Route::post('/edit/profile/password', 'ProfileController@updatePassword')->name('/edit/profile/password/update'); //actualizar
  Route::delete('/destroy/profile', 'ProfileController@destroy'); //Eliminar
});
