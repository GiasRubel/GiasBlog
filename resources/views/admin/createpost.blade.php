@extends('layouts.header')
@section('title','create post')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection
@section('body')
<form class="form-horizontal" method="post" action="/admin/post" {{-- data-parsley-validate="" --}} enctype="multipart/form-data">
{{csrf_field()}}
  <fieldset>
    <legend>Create Post</legend>
    
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="title" id="inputEmail" placeholder="Title" value="{{ old('title') }}"  {{-- required="" --}}>
        <span class="help-block"></span>

        {{-- @include('partials.error') --}}

        @if ($errors->has('title'))
          <p class="text-danger">{{$errors->first('title')}}</p>
        @endif
        

      </div>

    </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Slug</label>
      <div class="col-lg-8">
        <input type="text" class="form-control" name="slug" id="inputEmail" placeholder="Slug" value="{{ old('slug') }}"  {{-- required="" --}}> 
        <span class="help-block"></span>

        @if ($errors->has('slug'))
            <p class="text-danger">{{$errors->first('slug')}}</p>
          @endif
      </div>  
    </div>

    <div class="form-group">
          <label for="select" class="col-lg-2 control-label">Selects</label>
          <div class="col-lg-8">
            <select class="form-control" id="select" name="catagory_id">

            @foreach ($cats as $cat)
              <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
              
            </select>
            
          </div>
      </div>

    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Image</label>
      <div class="col-lg-8">
        <input class="form-control-file" type="file" name="image"/> 
        <span class="help-block"></span>

        @if ($errors->has('image'))
          <p class="text-danger">{{$errors->first('image')}}</p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Body</label>
      <div class="col-lg-8">
        <textarea class="form-control" rows="9" id="textArea" name="body" {{-- required="" --}}>{{ old('body') }}</textarea>
        <span class="help-block"></span>
        @if ($errors->has('body'))
          <p class="text-danger">{{$errors->first('body')}}</p>
        @endif
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
  </script>
@endsection