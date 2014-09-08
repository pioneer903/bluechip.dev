<?php

class PagesController extends BaseController{

	public function contact()
	{
		return View::make('/');
	}

	
	public function letter()
	{
		$pages = Page::where('id', '=', 6)->first();
    	return View::make('pages.letter')
    		->with('pages', $pages);
	}

	public function create()
	{
		$player = Player::where('first_name', '=' , 'Joel')->first();
		$seasons = Season::orderBy('id', 'desc')->get();
	    $seasons_array = array();
	    foreach ($seasons as $s) {
	      $seasons_array[$s->id] = $s->grad_year . ' ' . $s->season;
	    }
		return View::make('pages.create', compact('seasons_array', 'player'));
	}

	public function store() {
	    $input = Input::all();
	    $page = new Page;
	    $page->letter = $input['letter'];
		$page->save();

	    return Redirect::to('letter');
	  }


}