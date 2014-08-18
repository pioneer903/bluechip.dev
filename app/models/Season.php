<?php

class Season extends \Eloquent {
	protected $fillable = [];

	public static $unguarded = true;
	
	public function players()
	{
		return $this->hasMany('Player');
	}

	public static $rules = array(
		'grad_year' => 'required',
		'season' => 'required'
		);
	public static $messages = array(
		'grad_year.required' => 'The graduation year is required',
		'season.required'  => 'The name of the season is required'
		);
	public  $timestamps = false;
}