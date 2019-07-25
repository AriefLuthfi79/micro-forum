<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = ['name', 'user_id'];
 
    /**
	* Get the user that owns the forums
	*
	* @return App\Models\User
    */
    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
	* Get the forums by category
	*
	* @return App\Models\Categories
    */
    public function categories()
    {
    	return $this->hasMany(\App\Models\Category::class, 'forum_id');
    }
}
