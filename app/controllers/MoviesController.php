<?php

class MoviesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /movies
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('movies.index');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /movies/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'form to create a new one';
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /movies
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /movies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /movies/{id}/edit
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
	 * PUT /movies/{id}
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
	 * DELETE /movies/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}