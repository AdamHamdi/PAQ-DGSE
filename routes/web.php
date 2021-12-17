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
Route::post('/','UserController@logout')->name('Logout');
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
//Registration
Route::post('/register/res-action', 'UserController@ResActionStore')->name('ResActionStore');
Route::post('/register/res-domaine', 'UserController@ResDomaineStore')->name('ResDomaineStore');
Route::get('/dashboard', 'UserController@index')->name('dashboard');
//authentification
Route::post('/auth','UserController@auth')->name('auth');
Route::group(['middleware' => 'auth'], function()
{
// --------------------------- Rendez-vous----------------------
Route::get('/rendez-vous', 'RendezVousController@index')->name('rendez-vous');
Route::post('/rendez-vous/ajouter', 'RendezVousController@Store')->name('rendez-vous-store');
Route::delete('rendez-vous/{id}', 'RendezVousController@delete')->name('rendez-vous-delete');
Route::get('rendez-vous/{id}/edit', 'RendezVousController@edit')->name('rendez-vous-edit');
Route::put('rendez-vous/{id}/update', 'RendezVousController@update')->name('rendez-vous-update');
//-----------------------------------Actions---------------------------

Route::get('/actions', 'ActionController@index')->name('actions');
Route::post('/action/ajouter', 'ActionController@Store')->name('actions-store');
Route::delete('action/{id}', 'ActionController@delete')->name('Action-delete');
Route::get('action/{id}/detail', 'ActionController@detail')->name('Action-detail');
Route::get('action/{id}/edit', 'ActionController@edit')->name('Action-edit');
Route::put('action/{id}/update', 'ActionController@update')->name('Action-update');


});