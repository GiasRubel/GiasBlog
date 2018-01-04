@extends('layouts.header')
@section('title','LIST OF Catagory')

        @section('body')
        
        <br>
       @if (session()->has('massage'))
           <h4 class="alert alert-success">{{session()->get('massage')}}</h4>
       @endif

    	<div class="row">
    
    		<div class="col-lg-12 ">
        <br>
    		<a href="{{url('admin/catagory/create')}}" class="btn btn-info btn-lg pull-right">ADD catagory</a>
    		<br><br><br>
            <table class="table table-striped table-hover ">
              <thead>
                <tr>
                  <th>serial</th>
                  <th>Catagory</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @php
                $i = 1;
                $p = ($page-1)*5 + 1;
              @endphp
              @foreach ($items as $item)
                <tr>
                  <td>
                    @if (isset($page))
                      {{$p++}}
                      @else
                      {{$i++}}
                    @endif
                  </td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->created_at->diffForHumans()}}</td>
                  <td>
                    <a href="{{route('catagory.edit',$item->id)}}" class="btn btn-default btn-xs">EDIT</a> || 

                    <form class="form-group form-spacing-top" method="post" action="{{ route('catagory.destroy',$item->id) }}">
                    {{csrf_field()}}
                      {{method_field('DELETE')}}
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

                	
         @stop