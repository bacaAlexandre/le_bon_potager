<?php

//////// Accueil  ////////
Route::get('/', 'AccueilController@index');


//////// Contact  ////////
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');


//////// Annonce ////////
Route::get('/annonce', 'AnnonceController@index');


//////// ConnexionInscription ////////
Route::get('/connexion', 'ConnexionInscriptionController@index');
Route::post('/connexion', 'ConnexionInscriptionController@connexion');
Route::post('/connexion', 'ConnexionInscriptionController@inscription');
