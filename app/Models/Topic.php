<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'category_id', 'user_id'];

    /**
	* Belongs to user
	*
	* @return App\Models\User
    */
    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class);
    }

    /**
	* Belongs to category
	*
	* @return App\Models\Category
    */
	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

    /**
    * The User has many ratings
    * 
    * @return Rating
    */
    public function ratings()
    {
        return $this->morphMany(\App\Models\Rating::class, 'rateable');
    }

    public function sumRating()
    {
        return $this->ratings()->sum('rating');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
}
