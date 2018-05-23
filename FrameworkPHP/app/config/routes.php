<?php

//////// Accueil  ////////
Route::get('/', 'AccueilController@index', 'Accueil');


//////// Contact  ////////
Route::get('/contact/{id:[0-9]+}', 'ContactController@index', 'Annonce');
Route::post('/contact/envoyer', 'ContactController@contacter', 'Annonce');

//////// Annonce ////////
Route::get('/annonce', 'AnnonceController@index', 'Annonce');
Route::get('/annonce/{dep:[0-9]+}', 'AnnonceController@recherche', 'Annonce');
Route::get('/annonce/{dep:[0-9]+}/{pro:[0-9]+}', 'AnnonceController@recherche', 'Annonce');

/////// MonPotager /////
Route::get('/potager', 'MonPotagerController@index', 'Potager');
Route::post('/potager/store', 'MonPotagerController@store', 'Potager');

/////// MonP Compte /////
Route::get('/compte', 'MonCompteController@index', 'Compte');
Route::post('/compte/changeinfos', 'MonCompteController@changeInfos', 'Compte');
Route::post('/compte/changemdp', 'MonCompteController@changePassword', 'Compte');

//////// ConnexionInscription ////////
Route::get('/connexion', 'ConnexionInscriptionController@index', 'Connexion');
Route::post('/connexion/login', 'ConnexionInscriptionController@connexion', 'Connexion');
Route::post('/connexion/register', 'ConnexionInscriptionController@inscription', 'Connexion');
Route::get('/connexion/register/{token}', 'ConnexionInscriptionController@confirm', 'Connexion');

//////// Admin liste Utilisateur ////////
Route::get('/admin/utilisateur', 'AdminUtilisateurController@index', 'AdminUtilisateur');
Route::post('/admin/utilisateur/edit', 'AdminUtilisateurController@edit', 'AdminUtilisateur');
Route::post('/admin/utilisateur/changeinfos', 'AdminUtilisateurController@changeInfos', 'AdminUtilisateur');
Route::get('/admin/utilisateur/{id:[0-9]+}/lock', 'AdminUtilisateurController@lock');

//////// Admin liste Annonce ////////
Route::get('/admin/annonce', 'AdminAnnonceController@index', 'AdminAnnonce');
Route::get('/admin/annonce/{id:[0-9]+}/lock', 'AdminAnnonceController@lock', 'AdminAnnonce');

//////// Admin liste Produit ////////
Route::get('/admin/produit', 'AdminProduitController@index', 'AdminProduit');

//////// Admin Statistique ////////
Route::get('/admin/statistique', 'AdminStatistiqueController@index', 'AdminStatistique');
Route::post('/admin/statistique/data', 'AdminStatistiqueController@data', 'AdminStatistique');


//////// Deconnexion ////////
Route::get('/deconnexion', 'ConnexionInscriptionController@logout', 'Connexion');


