<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
	/**
	* The attributes that are mass assignable
	*
	* @var array
	*/
    public $fillable = ['rating'];

    /**
	* @return mixed
    */
    public function rateable()
    {
    	return $this->morphTo();
    }

    /**
	* Rating belongs to user
	*
	* @return \App\Models\User
    */
    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class);
    }
}
