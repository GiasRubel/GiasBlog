<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class Emailcontroller extends Controller
{
    public function index()
    {
    	return view('web.contact');
    }

    public function send(Request $request)
    {

    	$this->validate($request, [
    		'name'    => 'required|min:4|regex:/^[A-Za-z\s-_]+$/',
    		'email'   => 'required|E-Mail',
    		'subject' => 'min:4',
    		'message' => 'required|min:10'
    		]);
    	$data = array(
    		'name'    => $request->name,
    		'email'   =>$request->email, 
    		'subject' =>$request->subject,
    		'bodymessage' =>$request->message
    		);
    	Mail::send('vlog.emails', $data, function ($message) use ($data){
    	    $message->from($data['email']);
    	    $message->to('gias.rubel.gggg@gmail.com');
    	    $message->subject($data['subject']);
    
    	});

    	return redirect('/contact');

    	// return response()->json(['message' => 'Request completed']);
    }
}
