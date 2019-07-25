<?php

namespace App\Repositories;

class UserRepository extends BaseRepository
{
	/**
	* Specify the class name from model
	*
	* @return App\Models\User
	*/
	function model()
	{
		return \App\Models\User::class;
	}
}