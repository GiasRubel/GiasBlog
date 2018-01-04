@extends('layouts.header')
@section('title','Single post')
       
 @section('body')
<br>


<div class="container">
    {{-- <div class="well">  --}}
        <div class="row">
             <div class="col-md-10">
                 {{-- <div class="row hidden-md hidden-lg"><h1 class="text-center" >TITULO LARGO DE UNA INVESTIGACION cualquiera</h1></div> --}}
                     
                 <div class="pull-left col-md-6 col-xs-12 thumb-contenido"><img src="{{asset('images/'.$items->image)}}" alt="" width="250" height="160"> </div>
                 <div class="" >
                     <h1  class="hidden-xs hidden-sm">{{$items->title}}</h1>
                     <hr>
                     <small>{{date('M j, Y h:ia',strtotime($items->created_at))}}</small><br>
                     <small><strong>Author</strong></small>
                     <hr>
                     <p class="text-justify">{{$items->body}}</p>
                     
                 </div>
             </div>
              	
        </div>
    {{-- </div> --}}
</div>
 @endsection