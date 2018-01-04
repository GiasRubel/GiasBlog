<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\post;

class searchController extends Controller
{
    // public function __construct()
    // {
    // 	$this->middlware('auth:admin');
    // }

    public function search()
    {
    	$search = input::get('search');
        $page = Input::get('page');

    	if($search == "")
    	{
    		return view('admin.index');
    	}
    	else{
    		$items = post::where('title', 'like', '%'.$search.'%')->paginate(5);
    		return view('admin.search', compact('items','page'));
    	}
    }

    public function autocomplete()
    {
         $term = Input::get('term');
         $results = array();
         $items = post::where('title', 'like', '%'.$term.'%')->get();
         if (count($items) == '') {
           $results[] = 'Not found';
        }
         else{
         foreach ($items as $item) {
             $results[] = [ 'id' => $item->id, 'value' => $item->title ];
            }

         }
         // return \Response::json($results);
         return $results;
    }
}
