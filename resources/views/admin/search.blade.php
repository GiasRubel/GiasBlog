@extends('layouts.header')
@section('title','search results')

@section('body')

<br>
		<div class="row">
	
			<div class="col-lg-12 ">
			<a href="post/create" class="btn btn-info btn-lg pull-right">ADD POSTS</a>
			<br><br><br>

	        <table class="table table-striped table-hover ">
	          <thead>
	            <tr>
	              <th>serial</th>
	              <th>Title</th>
	              <th>Body</th>
	              <th>Catagory</th>
	              <th>Created At</th>
	              <th>Action</th>
	              
	            </tr>
	          </thead>
	          <tbody>
	        @php
	            $i = 1;
	            $p = ($page-1)*5+1;
	        @endphp
	          @foreach ($items as $item)  
	            <tr>
	              {{-- <td>{{$loop->index+1}}</td> --}}
	              <td>
	              @if (isset($page))
	                {{ $p++}}
	              @else
	                {{$i++}}
	              @endif
	              </td>

	              <td><a href="post/{{$item->id}}">{{$item->title}}</a></td>
	              <td>{{substr($item->body,0,50)}}{{strlen($item->body) > 50 ? "..." : ""}}</td>
	              <td>{{$item->catagory->name}}</td>
	              <td>{{$item->created_at->diffForHumans()}}</td>
	              <td>
	                   <a href="post/{{$item->id}}/edit" class="btn btn-default btn-xs ">EDIT</a> ||

	                  <form class="form-group form-spacing-top" method="post" action="post/{{$item->id}}">
	                  {{csrf_field()}}
	                    {{method_field('DELETE')}}
	                      {{-- <a href="#" class="btn btn-warning btn-xs" style="margin-top: -40px;margin-left: 53px;">DELETE</a>  --}}
	                      <button type="submit" class="btn btn-warning btn-xs" style="margin-top: -40px;margin-left: 53px;" >DELETE</button>
	                  </form>
	                  
	              </td>
	              
	              
	            </tr>
	             @endforeach
	          </tbody>
	        </table> 
	        <div class="text-center">
	            
	                {{ $items->links() }}
	            
	        </div>	
			</div>
		</div>
@endsection