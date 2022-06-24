<?php
use App\Domaine;
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
    $domaine=Domaine::all();
    return view('auth.register-res-domaine',['d'=>$domaine]);
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
Route::get('/action/responsable-action', 'ActionController@responsable_action')->name('actions-action');
Route::get('/actions', 'ActionController@index')->name('actions');
Route::post('/action/ajouter', 'ActionController@Store')->name('actions-store');
Route::delete('action/{id}', 'ActionController@delete')->name('Action-delete');
Route::get('action/{id}/detail', 'ActionController@detail')->name('Action-detail');
Route::get('action/{id}/edit', 'ActionController@edit')->name('Action-edit');
Route::put('action/{id}/update', 'ActionController@update')->name('Action-update');
/**---------------------------------- cahier de charge -------------------------------------------- */
Route::get('/cahier-charge', 'CahierChargeController@index')->name('cahier-charge');
Route::post('/cahier-charge/ajouter', 'CahierChargeController@Store')->name('cahier-charge-store');
Route::delete('cahier-charge/{id}', 'CahierChargeController@delete')->name('cahier-charge-delete');
Route::get('cahier-charge/{id}/detail', 'CahierChargeController@detail')->name('cahier-charge-detail');
Route::get('cahier-charge/{id}/edit', 'CahierChargeController@edit')->name('cahier-charge-edit');
Route::put('cahier-charge/{id}/update', 'CahierChargeController@update')->name('cahier-charge-update');
/**------------------------------------Produits-------------------------------- */
Route::get('/produits', 'ProductController@index')->name('produits');
Route::post('/produits/ajouter', 'ProductController@Store')->name('produits-store');
Route::delete('produits/{id}', 'ProductController@delete')->name('produits-delete');
Route::get('produits/{id}/detail', 'ProductController@detail')->name('produits-detail');
Route::get('produits/{id}/edit', 'ProductController@edit')->name('produits-edit');
Route::put('produits/{id}/update', 'ProductController@update')->name('produits-update');
/**------------------------------------Domaines-------------------------------- */
Route::get('/domaines', 'DomaineController@index')->name('domaines');
Route::post('/domaines/ajouter', 'DomaineController@Store')->name('domaines-store');
Route::delete('domaines/{id}', 'DomaineController@delete')->name('domaines-delete');
Route::get('domaines/{id}/detail', 'DomaineController@detail')->name('domaines-detail');
Route::get('domaines/{id}/edit', 'DomaineController@edit')->name('domaines-edit');
Route::put('domaines/{id}/update', 'DomaineController@update')->name('domaines-update');

/**------------------------------------Profil-------------------------------- */
Route::get('/profil', 'AdminController@profil')->name('profil');
Route::put('profil/{id}/update', 'AdminController@update')->name('update-profil');

// --------------------------- Reunion----------------------
Route::get('/reunion', 'ReunionController@index')->name('reunion');
Route::post('/reunion/ajouter', 'ReunionController@Store')->name('reunion-store');
Route::delete('reunion/{id}', 'ReunionController@delete')->name('reunion-delete');
Route::get('reunion/{id}/edit', 'ReunionController@edit')->name('reunion-edit');
Route::put('reunion/{id}/update', 'ReunionController@update')->name('reunion-update');
// --------------------------- Dashbord---------------------
Route::get('/dashbord/admin', 'UserController@dashboard_admin')->name('dashboard-admin');
Route::get('/dashbord/responsable-domaine', 'UserController@dashboard_responsable_domaine')->name('dashboard-responsable-domaine');
Route::get('/dashbord/responsable-action', 'UserController@dashboard_responsable_action')->name('dashboard-responsable-action');
Route::get('/route', 'ActionController@budget')->name('route');
// --------------------------- users---------------------
Route::delete('/users/{id}', 'UserController@delete')->name('delete-user');
Route::get('/dashbord/responsable-domaine', 'UserController@dashboard_responsable_domaine')->name('dashboard-responsable-domaine');
Route::get('/dashbord/responsable-action', 'UserController@dashboard_responsable_action')->name('dashboard-responsable-action');
Route::get('/route', 'ActionController@budget')->name('route');
 

});