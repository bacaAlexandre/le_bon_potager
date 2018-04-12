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
Route::post('/connexion/login', 'ConnexionInscriptionController@connexion');
Route::post('/connexion/register', 'ConnexionInscriptionController@inscription');


//////// Admin liste Utilisateur ////////
Route::get('/admin/utilisateur', 'AdminUtilisateurController@index');

//////// Admin liste Produit ////////
Route::get('/admin/produit', 'AdminProduitController@index');


