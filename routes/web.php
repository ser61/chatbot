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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/facebook', 'BotController@bot')->middleware('chat');
Route::post('/facebook', 'BotController@bot');

Route::get('/policy', function () {
    return 'We do not reveal any information to public.';
});


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('docentes','DocenteController');

Route::resource('materias','MateriaController');
