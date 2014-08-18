<?php

class SeasonsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /seasons
	 *
	 * @return Response
	 */
	public function index()
	{
		$seasons = Season::all();
		
		return View::make('seasons.index')
			->with('seasons', $seasons);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /seasons/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$seasons= Season::all();
		return View::make('seasons.create', compact('seasons'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /seasons
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();	
		$v = Validator::make($input, Season::$rules, Season::$messages);
		if($v->passes()){
			$season = new Season;
			$season->grad_year = $input['grad_year'];
			$season->season = $input['season'];
			$season->save();
			return Redirect::to('/seasons/create')->with('success', 'You created new season '. $season->grad_year . ' '. $season->season.' successfully');
		}else{
			return Redirect::to('seasons/create')
				->withInput()
				->withErrors($v);
		}
	}

	/**
	 * Display the specified resource.
	 * GET /seasons/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$seasons = Season::where('seasons.season', '=', $id)
			->where('seasons.grad_year', '2018')
			->get();
		return View::make('seasons.index')
			->with('seasons', $seasons);



	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /seasons/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /seasons/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /seasons/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}