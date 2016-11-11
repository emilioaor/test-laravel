<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Rutas INDEX
Route::get('/','indexController@index');
Route::get('/{id}','indexController@show');
Route::get('/publication/create','indexController@create');
Route::post('/publication/store','indexController@store');
Route::get('my/publications','indexController@myPublications');
Route::get('comment/send','indexController@sendComment');
Route::get('comment/update/{id}','indexController@updateComments');
