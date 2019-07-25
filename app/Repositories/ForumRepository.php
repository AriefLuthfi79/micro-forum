<?php

namespace App\Repositories;

class ForumRepository extends BaseRepository
{
	/**
	* Specify the model's name by overriding it from the base class
	*
	* @return App\Models\Forum
	*/
	function model()
	{
		return \App\Models\Forum::class;
	}
}