<?php

//////// Accueil  ////////
Route::get('/', 'AccueilController@index');


//////// Contact  ////////
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@store');


//////// Annonce ////////
Route::get('/annonce', 'AnnonceController@index');

/////// Mon Potager /////
Route::get('/monPotager', 'MonPotagerController@index');


//////// ConnexionInscription ////////
Route::get('/connexion', 'ConnexionInscriptionController@index');
Route::post('/connexion/login', 'ConnexionInscriptionController@connexion');
Route::post('/connexion/register', 'ConnexionInscriptionController@inscription');


