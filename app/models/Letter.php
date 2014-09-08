<?php

class Letter extends \Eloquent {
	protected $fillable = [];
	
	public static $unguarded = true;

	protected $table = 'letters';

	public static $rules_update = array(
		
		'letter_title' => 'required',
		'letter_text'  => 'required'
		);
}