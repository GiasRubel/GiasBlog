@extends('layouts.header')
@section('title','Edit post')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('body')
<form class="form-horizontal" method="post" action="../../post/{{$items->id}}" data-parsley-validate="" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('PUT')}}
  <fieldset>
    <legend>Edit Post</legend>
    
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="title" id="inputEmail" placeholder="Title" value="{{ $items->title }}"  required="">
        {{-- @include('partials.error')--}}
        </div>
    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Slug</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="slug" id="inputEmail" placeholder="Slug" value="{{ $items->slug }}"  required=""> 
      </div>
    </div>

    <div class="form-group">
          <label for="select" class="col-lg-2 control-label">Selects</label>
          <div class="col-lg-8">
            <select class="form-control" id="select" name="catagory_id">

            @foreach ($cats as $cat)
              @if ($items->catagory_id == $cat->id)
                 <option value="{{$cat->id}}" selected>{{$cat->name}}</option>
                 @else
                 <option value="{{$cat->id}}">{{$cat->name}}</option>
              @endif
              
            @endforeach
              
            </select>
            
          </div>
      </div>

  <div class="form-group">
    <label for="inputEmail" class="col-lg-2 control-label">Image</label>
    <div class="col-lg-8">
      <img src="{{asset('images/'. $items->image)}}" alt="" class="img-thumbnail"> 
      <br><br>
      <input class="form-control-file" type="file" name="image"/>
    </div>
  </div>
    

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-8">
        <textarea class="form-control" rows="9" id="textArea" name="body" required="">{{ $items->body }}</textarea>
        <span class="help-block"></span>
      </div>
    </div>

    <div class="form-group">
          <label for="select" class="col-lg-2 control-label">Select Tag</label>
          <div class="col-lg-8">
            <select class="form-control js-example-basic-multiple" id="select" name="tag[]" multiple="multiple">

            @foreach ($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
              
            </select>
            
          </div>
      </div>
    
    <div class="form-group">
      <div class="col-lg-8 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

@stop

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <script type="text/javascript">
  $(".js-example-basic-multiple").select2();
  $(".js-example-basic-multiple").select2().val({{ json_encode($items->tags()->allRelatedIds()) }}).trigger('change');
  </script>
@endsection