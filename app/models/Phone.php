<?php

class Phone extends \Eloquent {
	protected $fillable = [];

	public function player()
	{
		return belongsTo('player');
	}
}
$phone = Player::all()->phones;