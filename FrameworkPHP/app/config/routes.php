<?php

//////// Accueil  ////////
Route::get('/', 'AccueilController@index');


//////// Contact  ////////
Route::get('/contact/{id:[0-9]+}', 'ContactController@index');
Route::post('/contact/envoyer', 'ContactController@contacter');

//////// Annonce ////////
Route::get('/annonce', 'AnnonceController@index');
Route::get('/annonce/{dep:[0-9]+}', 'AnnonceController@recherche');
Route::get('/annonce/{dep:[0-9]+}/{pro:[0-9]+}', 'AnnonceController@recherche');

/////// MonPotager /////
Route::get('/potager', 'MonPotagerController@index');
Route::post('/potager/store', 'MonPotagerController@store');

/////// MonP Compte /////
Route::get('/compte', 'MonCompteController@index');
Route::post('/compte/changeinfos', 'MonCompteController@changeInfos');
Route::post('/compte/changemdp', 'MonCompteController@changePassword');

//////// ConnexionInscription ////////
Route::get('/connexion', 'ConnexionInscriptionController@index');
Route::post('/connexion/login', 'ConnexionInscriptionController@connexion');
Route::post('/connexion/register', 'ConnexionInscriptionController@inscription');
Route::get('/connexion/register/{token}', 'ConnexionInscriptionController@confirm');

//////// Admin liste Utilisateur ////////
Route::get('/admin/utilisateur', 'AdminUtilisateurController@index');
Route::get('/admin/utilisateur/{id:[0-9]+}/edit', 'AdminUtilisateurController@edit');
Route::post('/admin/utilisateur/{id:[0-9]+}/changeinfos', 'AdminUtilisateurController@changeInfos');
Route::post('/admin/utilisateur/{id:[0-9]+}/changemdp', 'AdminUtilisateurController@changePassword');
Route::get('/admin/utilisateur/{id:[0-9]+}/lock', 'AdminUtilisateurController@lock');

//////// Admin liste Annonce ////////
Route::get('/admin/annonce', 'AdminAnnonceController@index');
Route::get('/admin/annonce/{id:[0-9]+}/lock', 'AdminAnnonceController@lock');

//////// Admin liste Produit ////////
Route::get('/admin/produit', 'AdminProduitController@index');

//////// Deconnexion ////////
Route::get('/deconnexion', 'ConnexionInscriptionController@logout');


