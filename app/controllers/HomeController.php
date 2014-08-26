<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public $restful = true;

	public function index()
	{
		
		// $players = Player::all();
	 //    $seasons = Season::all();
	 //    return Redirect::to('players')
	 //                    ->with('players', $players)
	 //                    ->with('seasons', $seasons);
		return View::make ('home.index');
		
	}
	public function postIndex()
	{
		return "form submitted. The name was: ". Input::get('first_name');
	}

	public function showSecret()
	{
		return View::make('home.secret');
	}

	public function about()
	{
		return View::make('home.about');
	}
	public function thanks()
	{
		return View::make('home.thanks');
	}
	
	

}
