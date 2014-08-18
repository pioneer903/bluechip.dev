<?php

class Role extends /Eloquent
{
	public function players()
	{
		return $this->hasMany('Player')
	}
}