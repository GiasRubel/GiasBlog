<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\support\Facades\storage;

use App\post;
use App\catagory;
use App\Tag;
use Image;
use File;


class newController extends Controller
{

   public function __construct()
   {
       $this->middleware('auth:admin');
   }
   
   public function index()
   {
      
      // $items = post::paginate(3);
      $items = post::orderby('id', 'desc')->paginate(5);
       $page = Input::get('page');
      
   	return view('admin.post',compact('items','page'));

   }

   public function create()
   {
      $cats = catagory::all();
      $tags = Tag::all();
   	return view('admin.createpost',compact('cats','tags'));
      // echo "<pre>";
      // print_r($cats);
      // echo "</pre>";
   }

   public function store(Request $request)
   {
      // dd($request);
   	//return $request->all();
   	$post = new post;
   	$this->validate($request,[
   		'title'       => 'required|unique:posts',
         'slug'        => 'required',
         'catagory_id' => 'required|integer',
   		'body'        => 'required',
         'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

   		]); 

      $post->title       = $request->title;
   	$post->slug        = $request->slug;
      $post->catagory_id = $request->catagory_id;
   	$post->body        = $request->body;

      // $post->image = $request->file('image');
      // $post->image = $request->image->store('public');
      if($request->hasFile('image'))
      {
         $image = $request->file('image');
         $filename = time().'.'.$image->getClientOriginalExtension();
         $location = public_path('images/'.$filename);
         Image::make($image)->resize(400,200)->save($location);

         $post->image = $filename;
      }

   	$post->save();

      $post->tags()->sync($request->tag,false);

      session()->flash('massage','Data Saved');
   	return redirect('admin/post');
   }

   public function show($id)
   {
      $item = post::find($id);
      // $url  = storage::url($item->image);
      return view('admin.showpost',compact('item'));
   }

   public function edit($id)
   {
      $items = post::find($id);
      $cats = catagory::all();
      $tags = Tag::all();
      // $image  = storage::url($items->image);
      return view('admin.editpost',compact('items','cats','tags'));
   }

   public function update(Request $request, $id)
   {
      $post = post::find($id);

      $this->validate($request,[
         'title'       => 'required',
         'slug'        => 'required',
         'body'        => 'required',
         'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         'catagory_id' => 'required|integer',
         ]); 
      $post->title = $request->title;
      $post->body = $request->body;
      $post->slug = $request->slug;
      $post->catagory_id = $request->catagory_id;
      // if($request->hasFile('image'))
      // {
      //    $post->image = $request->file('image');
      //    $post->image = $request->image->store('public');
      //  }
      if($request->hasFile('image'))
      {
         File::delete(public_path('images/'.$post->image));

         $image = $request->file('image');
         $filename = time().'.'.$image->getClientOriginalExtension();
         $location = public_path('images/'.$filename);
         Image::make($image)->resize(400,200)->save($location);

         $post->image = $filename;
         
      }
      $post->save();

      if (isset($request->tag)) {
         $post->tags()->sync($request->tag,true);
      }
      else{
         $post->tags()->sync(array());
      }
      session()->flash('massage','Data Updated');
      return redirect('admin/post');

   }

   public function destroy($id)
   {
      $item = post::find($id);

      $item->tags()->detach();
      $item->delete();
      session()->flash('massage','Data Deleted');
      return redirect('admin/post');
   }

}
