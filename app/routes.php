<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



Route::resource('realestates','RealestatesController');



Route::get('/', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('mine', array('as' => 'postLogin', 'uses' => 'UsersController@postLogin'));
Route::get('register', array('as' => 'register', 'uses' => 'UsersController@register'));
Route::post('register', array('as' => 'postRegister', 'uses' => 'UsersController@postRegister'));

Route::pattern('id' ,'[0-9]+');
Route::post('realestates/{id}', array('as' => 'contactingUser', 'uses' =>'UsersController@contactingUser'));

Route::post('search', array('as' => 'search', 'uses' => 'HomeController@search'));
Route::get('logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

Route::group(array('before' => 'auth', 'prefix' => 'mine'), function(){
	
	//Route::get('admin', array('as' =>'admin', 'uses' => 'AdminsController@index'));
	Route::resource('realestates','RealestatesController',['only' =>['create', 'edit', 'destroy', 'update', 'store']]);

	Route::get('{username}', array('as' => 'userProfile', 'uses' => 'AdminsController@index'));
	//Route::get('mine/{username}/realestates', array('as' => 'userRealestates', 'uses' => 'AdminsController@userRealestates'));
	Route::resource('{username}/realestates', 'AdminsController');

	//Need to work on it
	
	//Route::get('profile/{username}/details', array('as' => 'userDetails', 'uses' => 'AdminController@details'));

	
});
