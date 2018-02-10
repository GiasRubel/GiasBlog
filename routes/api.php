<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\post; 

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/posts', 'postController');


Route::get('/search', function(){
	$querystring = Input::get('querystring');
	$posts = post::where('title', 'like', '%'.$querystring.'%')->get();
	return response()->json($posts);
});