<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class post extends Model
{
	 use Searchable;

	  public function searchableAs()
    {
        return 'posts';
    }

	public function catagory()
	{
    	return $this->belongsTo('App\catagory');	
	}

	public function tags()
	{
		return $this->belongsToMany('App\Tag');
	}

	public function comments()
	{
		return $this->morphMany('App\Comment', 'commentable');
	}

	 // public function users()
  //   {
  //   	return $this->belongsTo('App\User');
  //   }
}
