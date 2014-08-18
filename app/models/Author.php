<?php

class Author extends \Eloquent {
	protected $fillable = [];

	public static $unguarded = true;

	public function posts()
	{
		return $this->hasMany('Post');
	}
}