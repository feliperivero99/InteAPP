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
    return redirect()->route('login');
});

/*Rutas de inicio de sesion */
Route::get('/', 'loginController@index')->name('login');

Route::match(['get', 'post'], '/login', 'loginController@login')->name('loginrequest');


/*Solo usuarios logueados pueden acceder a estas rutas */

Route::group(['middleware' => ['UserLogged']], function () {

      /*Rutas de dasboard */


Route::match(['get', 'post'], '/logout', 'loginController@logout')->name('logout');

Route::match(['get', 'post'], '/dashadmin', 'dashboardController@index')->name('dashadmin');

/*Rutas de usuarios */

Route::match(['get', 'post'], '/Usuarios/{aviso?}', 'UserController@index')->name('usuarios');

Route::match(['get', 'post'], '/Usuarios-search', 'UserController@searchUsers')->name('usuariossearch');

Route::match(['get', 'post'], '/Usuarios-create', 'UserController@createuser')->name('usuarioscreate');

Route::match(['get', 'post'], '/Usuarios-edit/{id?}', 'UserController@editUser')->name('usuariosedit');

Route::match(['get', 'post'], '/Usuarios-delete', 'UserController@deletetUser')->name('usuariosdelete');



/*Rutas de Peliculas */

Route::match(['get', 'post'], '/Peliculas/{aviso?}', 'PeliculasController@index')->name('Peliculas');

Route::match(['get', 'post'], '/Peliculas-search', 'PeliculasController@searchPeliculas')->name('Peliculassearch');

Route::match(['get', 'post'], '/Peliculas-create', 'PeliculasController@createPeliculas')->name('Peliculascreate');

Route::match(['get', 'post'], '/Peliculas-edit/{id?}', 'PeliculasController@editPeliculas')->name('Peliculasedit');

Route::match(['get', 'post'], '/Peliculas-delete', 'PeliculasController@deletetPeliculas')->name('Peliculasdelete');


}); //