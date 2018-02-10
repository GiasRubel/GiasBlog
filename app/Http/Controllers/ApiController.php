<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;



class ApiController extends Controller
{
    public function index()
    {
    	// $client = new Client();

    	$client = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
    	// $client->setHttpClient($client);
    	$res = $client->request('GET', 'https://api.github.com/user', [
    	    'auth' => ['gias.rubel@gmail.com', '01731898165gias']
    	]);
    	// $res = $client->request('GET', 'https://swapi.co/api/people/1/');
    	
    	// echo $res->getStatusCode();
    	// "200"
    	// echo $res->getHeader('content-type');
    	// // 'application/json; charset=utf8'
    	// echo $res->getBody();
    	// {"type":"User"...'
    	$arr_res = json_decode($res->getBody(), true);
    	echo "<pre>";
		 print_r( $arr_res );
    	echo "</pre>";

    	echo $arr_res['login'];
		// foreach ($arr_res as $results) {
		// 	echo $results;
		// }
    	//Send an asynchronous request.
    	// echo "<br/>";
    	// echo "<br/>";
    	// $request = new \GuzzleHttp\Psr7\Request('GET', 'http://httpbin.org');
    	// $promise = $client->sendAsync($request)->then(function ($response) {
    	//     echo 'I completed! ' . $response->getBody();
    	// });
    	// $promise->wait();
    }

    public function serchapi()
    {
    	return view('web.serchapi');

    }
    public function recipe()
    {
    	$search = input::get('serchapi');
    	$recipeapi = "https://api.edamam.com/search";
    	// $new = 'chiken';

    	       $params = [
    	           'q'       => $search,
    	           'app_id'  => '2659a3cb',
    	           'app_key' => '75290409658ebbea04bac113794e0ae1',
    	           'from'    => 0,
    	           'to'      => 5,
    	           'health'  => 'alcohol-free',
    	       ];

    	       $client   = new Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));

    	       $response = $client->get($recipeapi, [
    	           'query'  => $params,
    	           'verify' => false,
    	       ]);


    	       $data = (string) $response->getBody();
    	       $result = json_decode($data, true);

    	       return view('web.api', compact('result'));
    	       // Latter part for Test

    	       echo $result["q"] ."</br>";
    	       // echo $result["hits"] ."</br>";
    	       // echo $result['calories'];
    	       foreach ($result['hits'] as $key => $value) {
    	       // 	echo "<pre>";
    	       // print_r($value["recipe"]);
    	       // echo "</pre>";
    	       	foreach ($value as $key => $recipe) {
    	       		echo $recipe["image"]."</br>";
    	       		// echo "<img src=".$recipe["image"]."/>";
    	       	}
    	       }

    	       
    	         echo "<pre>";
    	       print_r($result["hits"]);
    	       echo "</pre>";
    	       echo "<pre>";
    	       print_r($result);
    	       echo "</pre>";

    }








}
