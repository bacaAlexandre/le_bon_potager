<?php

Route::get('/', 'HomeController@index');
Route::get('/home/{id:[0-9]+}', 'HomeController@edit');



//////// Accueil  ////////
Route::get('/accueil', 'AccueilController@index');


//////// Contact  ////////
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');



//////// Annonce ////////
Route::get('/annonce','AnnonceController@index');