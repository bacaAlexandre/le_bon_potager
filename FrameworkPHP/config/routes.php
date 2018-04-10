<?php

Route::get('/', 'HomeController@index');

Route::get('/home/{id:[0-9]+}', 'HomeController@edit');



Route::get('/accueil', 'AccueilController@index');