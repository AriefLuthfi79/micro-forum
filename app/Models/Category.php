<?php 

namespace App\Models;;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'forum_id'];

    /**
	* Category belongs to user
	* @return Collection
    */
    public function user()
    {
    	return $this->belongsTo(\App\Models\User::class);
    }
}
