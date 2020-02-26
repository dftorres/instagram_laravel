@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col"></div>
    <div class="col-10">
      <div class="row">
        <div class="d-flex bg-white rounded-lg shadow-sm">
          <div class="col-7 px-0">
            <img class="rounded-lg w-100" src="/storage/{{ $post->image }}" class="w-100">
          </div>
          <div class="col-5 px-0">
            <div class="row no-gutters d-block">
              <div class="mt-3">
                <div class="mx-4">
                  <a style="text-decoration: none !important;" href="{{ route("profile.index", $post->user)}}">
                    <div class="d-flex align-items-center">
                      <div class="pr-3">
                        <img src="/storage/{{ $post->user->profile->image }}" class="w-100 rounded-circle"
                          style="max-width: 40px;">
                      </div>
                      <div>
                        <div class="font-weight-bold">
                          <span class="text-dark">
                            {{ $post->user->username }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
                <hr>
                <div class="mx-4">
                  <a style="text-decoration: none !important;" href="{{ route("profile.index", $post->user)}}">
                    <span class="font-weight-bold text-dark">
                      {{ $post->user->username }}
                    </span>
                  </a>
                  {{ $post->caption }}
                </div>
              </div>
            </div>
            <div style="height: 47%"></div>
            <hr>
            <div class="row no-gutters d-block">
              <div>
                <div class="mx-4">
                  <action-buttons post-id="{{ $post->id }}" liked="{{ $liked }}">
                  </action-buttons>
                  <span class="font-weight-bold">{{ $likesCount }} likes</span>
                  <time-posted class="figure-caption" created-at="{{ $post->created_at }}"></time-posted>
                </div>
                <hr>
                <div class="mx-4">
                  <div class="pb-3 d-flex justify-content-between">
                    <input type="text" style="height: 28px; border: none; outline: none;" aria-label="Add a comment…"
                      placeholder="Add a comment…"></input>
                    <button class="btn btn-text py-0">
                      <span class="text-primary font-weight-bold">Post</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>
</div>
@endsection