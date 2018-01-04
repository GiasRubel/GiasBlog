<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\storage;
use Illuminate\support\Facades\Input;
use App\post;
use App\catagory;
use App\Tag;

class vlogController extends Controller
{
   public function index()
   {
   	$item = post::orderby('id', 'desc')->take(4)->get();
   	$cats = catagory::orderby('id', 'desc')->take(4)->get();
   	$tags = Tag::orderby('id','desc')->take(10)->get();
   	$forslides = post::all();
 	
   	return view('web.index',compact('item','cats','forslides','tags'));
   }

   public function blogs()
   {
   	$posts = post::orderby('id', 'desc')->paginate(3);
   	$tags  = Tag::all();
   	return view('web.blog',compact('posts','tags'));
   }

   public function single($id)
   {
   	 $post = post::find($id);
   	 return view('web.single',compact('post'));
   }

   public function tagpost($id)
   {
   	$tags = Tag::find($id);
   	return view('web.tagpost', compact('tags'));
   }

   public function search(Request $request)
   {

      $search = Input::get('search');

      if($search == '')
      {
         $item = post::orderby('id', 'desc')->take(4)->get();
         $cats = catagory::orderby('id', 'desc')->take(4)->get();
         $tags = Tag::orderby('id','desc')->take(10)->get();
         $forslides = post::all();
         return view('web.index',compact('item','cats','forslides','tags'));
      }
      else{
         $items = post::where('title', 'like', '%'.$search.'%')->get();
         return view('web.search', compact('items'));
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

 public function vsearch(){
    $query = Input::get('query');
    $users = post::where('title','like','%'.$query.'%')->get();
    return response()->json($users);
 }


public function about()
{
  return view('web.about');
}











}
