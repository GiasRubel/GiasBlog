@extends('vlog.header')
@section('title','Vlog')
@section('body')
<div class="panel panel-default" style="min-height: 400px; padding: 50px;">
        {{-- <table class="table table-bordered table-hover" >
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                </tr>
                @endforeach
            </tbody>
        </table> --}}
        @foreach ($items as $item)
         
        <div class="blog-artical-info-head">
            <h2><a href="{{ route('blog.single',$item->id) }}">{{$item->title}}</a></h2>
            <h6>Posted on, {{date(" ha: dS F Y", strtotime($item->created_at))}} by <a href="#"> admin</a></h6>
        </div>
        <div class="blog-artical-info-text">
            <p> 
            </p>{{substr($item->body, 0,300)}}
            @if (strlen($item->body) > 300)
                <a href="#">[...]</a>
            @endif
            </p>
        </div>
           {{-- expr --}}
        @endforeach

    </div>
 @endsection   