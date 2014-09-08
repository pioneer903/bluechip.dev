<?php

class LettersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /letters
	 *
	 * @return Response
	 */
	public function index()
	{
		$letters = Letter::all();
		return View::make('letters.index')
			->with('letters' ,$letters);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /letters/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$seasons = Season::orderBy('id', 'desc')->get();
	    $seasons_array = array();
	    foreach ($seasons as $s) {
	      $seasons_array[$s->id] = $s->grad_year . ' ' . $s->season;
	    }
		return View::make('letters.create', compact('seasons_array'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /letters
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
	    $letter = new Letter;
	    $letter->letter_title = $input['letter_title'];
	    $letter->letter_text = $input['letter_text'];
		$letter->save();

	    return Redirect::to('/letters');
	}

	/**
	 * Display the specified resource.
	 * GET /letters/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$letter = Letter::find($id);
		
    	return View::make('letters.show')
    		->with('letter', $letter);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /letters/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$letter = Letter::find($id);

		if(is_null($letter)){
			return Redirect::route('letters.index');
		}
		return View::make('letters.edit')
			->with('letter', $letter);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /letters/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
	    $input = Input::except(array('_method', '_token'));
	    $user = User::where('username', '=', 'admin');
	    $validation = Validator::make($input, Letter::$rules_update);
	    if ($validation->passes()) {
	      $letter = Letter::find($id);
	      $letter->update($input);

	      return Redirect::route('letters.edit', $id)
	                      ->with('success', $letter->letter_title.' was successfully updated');
	    }
	    return Redirect::route('letters.edit', $id)
	                    ->withInput()
	                    ->withErrors($validation)
	                    ->with('message', 'There were validation errors.');
	  }

	/**
	 * Remove the specified resource from storage.
	 * DELETE /letters/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}