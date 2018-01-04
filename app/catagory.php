<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catagory extends Model
{
    protected $table = 'catagories';

    public function posts()
    {
    	return $this->hasMany('App\post');
    }
}
