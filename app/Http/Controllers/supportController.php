<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class supportController extends Controller
{
    public function showslug($slug)
    {
    	// return $slug;
    	  // $item = post::where('slug', '=', $slug)->get();

    	$items = post::where('slug', '=', $slug)->first();
    	 return view('admin.singlepost',compact('items'));
    }


}
