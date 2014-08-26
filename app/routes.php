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

Route::get('/', 'HomeController@showWelcome');

// Authentication
Route::get('login', 'AuthController@showLogin');
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');


// Secured Routes
Route::group(array('before' => 'auth'), function()
{
    Route::get('secret', 'HomeController@showSecret');
    Route::post('players/print', 'PlayersController@playerPrint');
    Route::resource('players', 'PlayersController');
    Route::resource('seasons', 'SeasonsController');

});


Route::get('contact', 'Pages@contact');
Route::resource('users', 'UserController');

Route::get('/register', 'UserController@showUserRegistration');
Route::post('/register', 'UserController@saveUser');


Route::get('/', 'HomeController@index');
Route::get('about', 'HomeController@about');
Route::get('thanks', 'HomeController@thanks');

Route::post('ajax', 'PlayersController@ajax');
Route::post('players/password', array('as'=>'players.password','uses'=>'PlayersController@password'));
Route::post('ajaxLetter', 'PlayersController@ajaxLetter');
Route::post('email', 'PlayersController@email');
Route::post('sendemail', 'PlayersController@emailSend');

Route::get('link/{token}', 'PlayersController@link');
Route::get('print_player/{id}', array('as' => 'print_player', 'uses'=> 'PlayersController@print_player', function($id){}));
Route::get('letter/{id}', array('as' => 'letter', 'uses'=> 'PlayersController@letter', function($id){}));

Route::get('save_pdf/{id}', array('as' => 'save_pdf', 'uses'=> 'PlayersController@save_pdf', function($id){}));

Route::get('confirmation/{id}', array('as' => 'confirmation', 'uses'=> 'PlayersController@confirmation', function($id){}));
Route::get('create', function(){
	return View::make('home.create');

});
