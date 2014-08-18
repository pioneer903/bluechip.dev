<?php

class Post extends Eloquent
{
	protected $table = 'posts';

	public static $unguarded = true;

	public function comment()
	{
		//reference to Comments class and gets foreign key post_id(even though the last is not necessary in this case)
		return $this->hasMany('Comment', 'post_id');
	}

	public function index()
	{
		return View::make('posts/index');
	}

	public function author()
	{
		return $this->belongsTo('Author');
	}
}