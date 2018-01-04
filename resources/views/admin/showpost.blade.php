@extends('layouts.header')
@section('title','POST')
       
 @section('body')
<br>


<div class="container">
    {{-- <div class="well">  --}}
        <div class="row">
             <div class="col-md-7">
                 {{-- <div class="row hidden-md hidden-lg"><h1 class="text-center" >TITULO LARGO DE UNA INVESTIGACION cualquiera</h1></div> --}}
                     
                 <div class="pull-left col-md-6 col-xs-12 thumb-contenido"><img src="{{asset('images/'.$item->image)}}" alt="" width="250" height="160"> </div>
                 <div class="" >
                     <h1  class="hidden-xs hidden-sm">{{$item->title}}</h1>
                     <hr>
                     <small>{{date('M j, Y h:ia',strtotime($item->created_at))}}</small><br>
                     <small><strong>Author</strong></small><br>
                      @foreach ($item->tags as $tag)
                        <small><span class="label label-primary">
                             {{$tag->name}}
                        </span></small>
                     @endforeach
                     <hr>
                     <p class="text-justify">{{$item->body}}</p>
                 </div>
             </div>
              	<div class="col-lg-4 ">
             		<div class="panel panel-default">
             		  <div class="panel-body">
             		    <p>Last updated:<cite title="Source Title">{{date('M j, Y h:ia',strtotime($item->updated_at))}}</cite></p>
                        <p><strong>Catagory:</strong> {{$item->catagory->name}}</p>
             		    <p>url: <a href="{{url('admin/blog/'. $item->slug)}}">{{url('admin/blog/'. $item->slug)}}</a></p>
             		    <a href="../post/{{$item->id}}/edit" class="btn btn-primary  ">EDIT</a> ||
             		    <form class="form-group" method="post" action="../post/{{$item->id}}">
                           {{csrf_field()}}
                           {{method_field('DELETE')}}
                             <button type="submit" class="btn btn-warning " style="margin-top: -55px;margin-left: 72px;" >DELETE</button>     
                          </form> 
                          <a href="../post" class="btn btn-success pagination-centered">BACK</a> 
             		  </div>
             		</div>
              	</div>
        </div>
    {{-- </div> --}}
</div>
 @endsection