<?php

//////// Accueil  ////////
Route::get('/', 'AccueilController@index');


//////// Contact  ////////
Route::post('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@contacter');

//////// Annonce ////////
Route::get('/annonce', 'AnnonceController@index');
Route::post('/annonce/departement', 'AnnonceController@recherchePost');
Route::get('/annonce/departement/{dep:[0-9]+}', 'AnnonceController@rechercheGet');

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
Route::get('/connexion/logout', 'ConnexionInscriptionController@logout');

//////// Admin liste Utilisateur ////////
Route::get('/admin/utilisateur', 'AdminUtilisateurController@index');
Route::get('/admin/utilisateur/{id:[0-9]+}/edit', 'AdminUtilisateurController@edit');

//////// Admin liste Produit ////////
Route::get('/admin/produit', 'AdminProduitController@index');

//////// Deconnexion ////////
Route::get('/deconnexion', 'DeconnexionController@index');


