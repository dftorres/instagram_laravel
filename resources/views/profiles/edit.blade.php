@extends('layouts.app')

@section('content')
<div class="container px-5">
  <form action="{{ route('profile.update', $user) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PATCH')

    <div class="row">
      <h1>Edit profile</h1>
    </div>

    <div class="row">
      <div class="col-8">
        <div class="form-group row">
          <label for="title" class="col-md-4 col-form-label">Title</label>

          <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') ?? $user->profile->title }}">
          @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-8">
        <div class="form-group row">
          <label for="description" class="col-md-4 col-form-label">Description</label>

          <input id="description" name="description" type="text"
            class="form-control @error('description') is-invalid @enderror"
            value="{{ old('description') ?? $user->profile->description }}">
          @error('description')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-8">
        <div class="form-group row">
          <label for="url" class="col-md-4 col-form-label">Url</label>

          <input id="url" name="url" type="text" class="form-control @error('url') is-invalid @enderror"
            value="{{ old('url') ?? $user->profile->url }}">
          @error('url')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
    </div>

    <div class="row">
      <label for="image">Profile picture</label>
      <input type="file" name="image" id="image" class="form-control-file">
      @error('description')
      <strong>{{ $message }}</strong>
      @enderror
    </div>

    <div class="row  mt-3">
      <button class="btn btn-primary">
        Save profile
      </button>
    </div>
  </form>
</div>
@endsection