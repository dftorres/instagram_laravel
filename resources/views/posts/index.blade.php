@extends('layouts.app')

@section('content')
<div class="container">
  @foreach ($posts as $post)
  <div class="row">
    <div class="col">

    </div>
    <div class="col-7">
      <div class="card mb-5">
        <div class="card-header">
          <a href="{{ route("profile.index", $post->user) }}" style="text-decoration: none !important;">
            <div class="d-flex align-items-center">
              <div class="col-1">
                <img class="rounded-circle mx-auto" style="max-width: 30px;"
                  src="/storage/{{ $post->user->profile->image }}">
              </div>
              <div class="col">
                <div class="font-weight-bold">
                  <span class="text-dark">
                    {{ $post->user->username }}
                  </span>
                </div>
              </div>
            </div>
          </a>
        </div>
        <img class="w-100" src="/storage/{{ $post->image}}">
        <div class="pt-3 pl-3 pr-3">
          <action-buttons post-id="{{ $post->id }}" liked="{{ $post->likes->contains(auth()->user()->id) }}">
          </action-buttons>
          <div class="d-flex">
            <div class="font-weight-bold pr-1">
              {{ $post->user->username }}
            </div>
            <div>
              {{ $post->caption }}
            </div>
          </div>
          <time-posted created-at="{{ $post->created_at }}"></time-posted>
        </div>
        <hr>
        <div class="pl-3 pb-3 pr-3 d-flex justify-content-between">
          <input type="text" style="height: 28px; border: none; outline: none;" aria-label="Add a comment…"
            placeholder="Add a comment…"></input>
          <button class="btn btn-text py-0">
            <span class="text-primary font-weight-bold">Post</span>
          </button>
        </div>
      </div>
    </div>
    <div class="col">

    </div>
  </div>
  @endforeach
</div>
@endsection