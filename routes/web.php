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

// cambiando la landing page non ci serve più questa rotta perchè utilizzeremo FRONTOFFICE
// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Auth::routes();
// rotta di default
// Route::get('/home', 'HomeController@index')->name('home');
// rotta che sarebbe da ripetere ogni volta per mandare alle varie pagine che richiedano autenticazione e non siano pubbliche
// Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');


// utiliziamo middleware per non riscrivere tutte le volte le singole rotte
Route::middleware('auth')
        ->namespace('Admin')
        ->name('admin.')
        ->prefix('admin')
        ->group(function(){
        Route::get('/','HomeController@index')->name('home');
        // rotta per il controller delle CRUD sui post
        Route::resource('posts', 'PostController');
            // creo rotta per la index delle categorie
        Route::get('/categories','CategoryController@index')->name('categories');
        // rotta per le categorie tramite gli slug,devo sempre richiamare il controller e dare un nome
        // ATTENZIONE ALLA ROUTE DOPO IL CONTROLLER DEVE ESSERCI IL PUNTAMENTO ALLA FUNZIONE CORRETTA!!
        Route::get('/categories/{slug}','CategoryController@show')->name('category_details');
        });


// rotta per VUE quando lo implementeremo FRONTOFFICE
// DEVE STARE ALLA FINE DOPO TUTTE LE ALTRE ROTTE
Route::get('{any?}', function(){
    return view('guests.home');
})->where('any', '.*');


