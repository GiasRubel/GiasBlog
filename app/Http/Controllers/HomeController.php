<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;
use App\catagory;
use App\Tag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
    return view('home');
    // $item = post::orderby('id', 'desc')->take(4)->get();
    // $cats = catagory::orderby('id', 'desc')->take(4)->get();
    // $tags = Tag::orderby('id','desc')->take(10)->get();
    // $forslides = post::all();
    
    // return view('web.index',compact('item','cats','forslides','tags'));
        
    }

    public function search()
    {
        
    }
}
