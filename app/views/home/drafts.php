
Route::get('{fname}', function($fname))
{
	return View::make('show')
	->with('fname', $fname);
});
