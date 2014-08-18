<?php

class CoachesController extends \BaseController {

	/**
	 * Display a listing of coaches
	 *
	 * @return Response
	 */
	public function index()
	{
		$coaches = Coach::all();

		return View::make('coaches.index', compact('coaches'));
	}

	/**
	 * Show the form for creating a new coach
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('coaches.create');
	}

	/**
	 * Store a newly created coach in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Coach::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Coach::create($data);

		return Redirect::route('coaches.index');
	}

	/**
	 * Display the specified coach.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$coach = Coach::findOrFail($id);

		return View::make('coaches.show', compact('coach'));
	}

	/**
	 * Show the form for editing the specified coach.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$coach = Coach::find($id);

		return View::make('coaches.edit', compact('coach'));
	}

	/**
	 * Update the specified coach in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$coach = Coach::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Coach::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$coach->update($data);

		return Redirect::route('coaches.index');
	}

	/**
	 * Remove the specified coach from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Coach::destroy($id);

		return Redirect::route('coaches.index');
	}

}
