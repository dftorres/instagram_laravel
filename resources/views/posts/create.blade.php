@extends('layouts.app')

@section('content')
<div class="container offset-2">
  <form action="{{ route("post.store") }}" enctype="multipart/form-data" method="POST">
    @csrf

    <div class="row">
      <h1>Add new Post</h1>
    </div>
    <div class="row">
      <div class="col-8">
        <div class="form-group row">
          <label for="caption" class="col-md-4 col-form-label">Post caption</label>
          <input id="caption" name="caption" type="text" class="form-control @error('caption') is-invalid @enderror"
            value="{{ old('caption') }}">
          @error('caption')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <label for="image">Post Image</label>
      <input type="file" name="image" id="image" class="form-control-file">
      @error('image')
      <strong>{{ $message }}</strong>
      @enderror
    </div>

    <div class="row  mt-3">
      <button class="btn btn-primary">
        Add new Post
      </button>
    </div>
  </form>
</div>
@endsection