<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\post;

class commentController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}

	public function index($id)
	{
		$post = post::find($id);
		return view('web.single', compact('post'));
	}

    public function addComment(Request $request, post $post)
    {

    	$comment = new Comment;
    	$this->validate($request, [
    			'body' => 'required',
    		]);
    	$comment->body    = $request->body;
    	$comment->user_id = Auth::user()->id;
    	$post->comments()->save($comment);
    	return back(); 	
    }

    public function addreply(Request $request,Comment $comment)
    {
    	$reply = new Comment;
    	$this->validate($request, [
    			'body' => 'required',
    		]);
    	$reply->body    = $request->body;
    	$reply->user_id = Auth::user()->id;
    	$comment->comments()->save($reply);
    	return back();
     }

     public function editcomment(Request $request, $id)
     {
     	$items = Comment::find($id);
     	 // dd($item);
     	$this->validate($request, [
     		'body' => 'required',
     		]);
     	$items->body = $request->body;
     	$items->save();

     	return back();
     }

     public function editReply(Request $request, $id)
     {
     	$items = Comment::find($id);
     	 // dd($item);
     	$this->validate($request, [
     		'body' => 'required',
     		]);
     	$items->body = $request->body;
     	$items->save();

     	return back();
     }

     public function destroy($id)
     {
     	$comment = Comment::find($id);

     	$comment->comments()->delete();

     	$comment->delete();

     	return back();
     }

     public function destroyReply($id)
     {
     	$reply = Comment::find($id);

     	$reply->delete();

     	return back();
     }
}
