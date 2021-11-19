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
    return view('auth.login');
});
//choisir login 
Route::get('/login', function () {
    return view('auth.login');
});
//choisir register  responsable action
Route::get('/signup/responsable-action', function () {
    return view('auth.register-res-action');
})->name('register-action');
//choisir register responsable de domaine
Route::get('/signup/responsable-domaine', function () {
    return view('auth.register-res-domaine');
})->name('register-domaine');
//choisir utilisateur 
Route::get('/select-user', function () {
    return view('auth.choisir-user');
})->name('select-user');
Auth::routes();
Route::post('/register/res-action', 'UserController@store')->name('ResActinStore');
Route::get('/dashboard', 'UserController@index')->name('dashboard');
//authentification
Route::post('/auth','UserController@auth')->name('auth');