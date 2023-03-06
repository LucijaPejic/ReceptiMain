<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

# ADMIN RUTE
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['isAdmin']], function () {

    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/kategorije', 'KategorijaController@index')->name('kategorije');
    Route::post('/kategorija/uredi/{id}', 'KategorijaController@urediKategoriju')->name('kategorija.uredi');
    Route::get('/kategorija/izbrisi/{id}', 'KategorijaController@izbrisiKategoriju');
    Route::get('/kategorija/dodaj', 'KategorijaController@novaKategorija');
    Route::post('/kategorija/dodaj', 'KategorijaController@dodajKategoriju');
 


    Route::get('/recept/dodaj', 'ReceptController@noviRecept');
    Route::post('/recept/dodaj', 'ReceptController@dodajRecept');
    Route::post('/recept/uredi/{id}', 'ReceptController@urediRecept');
    Route::get('/recept/izbrisi/{id}', 'ReceptController@izbrisiRecept');


});

# USER RUTE

Route::group(['prefix' => 'user', 'namespace' => 'User', 'as' => 'user.', 'middleware' => ['auth']], function () {

    Route::get('/', 'ReceptController@naslovna')->name('naslovna');
    Route::get('/recepti', 'ReceptController@recepti')->name('recepti');
    Route::get('/about', 'ReceptController@about')->name('recepti.about');
    Route::get('/kontakt', 'ReceptController@kontakt')->name('recepti.kontakt');
    Route::get('/recept/dodaj', 'ReceptController@noviRecept')->name('recept.novi');



    Route::post('/recept/dodaj', 'ReceptController@dodajRecept')->name('recept.dodaj');
});

# API

Route::get('/recepti', 'ReceptController@dohvatiRecepte');
Route::get('/kategorije', 'KategorijaController@dohvatiKategorije');
Route::get('/korisnici', 'KategorijaController@dohvatiKorisnike');

Auth::routes();
