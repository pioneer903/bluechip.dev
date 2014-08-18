<?php

class Player extends \Eloquent {
	protected $fillable = [];

	public static $unguarded = true;

	protected $table = 'players';

	public static $rules = array(
		// 'username' => 'required|between:4,16',
		// 'email' => 'required|email',
		// 'password' => 'required|alpha_num|min:8|confirmed',
		// 'password_confirmation' => 'required|alpha_num|min:8',
		'first_name' => 'required',
		'last_name'  => 'required'
		);
	public static $rules_update = array(
		// 'username' => 'required|between:4,16',
		// 'email' => 'required|email',
		'first_name' => 'required',
		'last_name'  => 'required'
		);
	public static $rules_auth = array(
		'username' => 'required|between:4,16',
		'email' => 'required|email',
		
		);
	public $autoPurgeRedundantAttributes = true;

	public static $messages = array(
		'first_name.required' => 'First name is required',
		'last_name.required'  => 'Last name is required',
		'username.required' => 'Username name is required',
		'password.required'  => 'Password is required'
		
		);
	public  $timestamps = false;

	public function roles()
	{
		return $this->belongsTo('Role');
	}

	public function seasons()
	{
		return $this->belongsTo('Season');
	}

	public function phone()
	{
		return $this->hasOne('Phone');
	}

}