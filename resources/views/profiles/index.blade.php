@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row px-5 align-items-center">
    <div class="col"></div>
    <div class="col-3">
      <img class="rounded-circle p-4 w-100" src="/storage/{{ $user->profile->image }}">
    </div>
    <div class="col-6 pt-5 mb-5">
      <div>
        <div class="d-flex align-items-center">
          <h1 class="mr-5">{{ $user->username}}</h1>
          @can('follow', $user->profile)
          <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
          @endcan
        </div>

        @can('update', $user->profile)
        <a class="mr-2" href="{{ route('profile.edit', $user) }}">Edit profile</a>
        <a href="{{ route('post.create') }}">Add new post</a>
        @endcan

        <div class="d-flex mt-2">
          <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
          <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
          <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
        </div>
        <div>
          <div class="pt-3 font-weight-bold">{{ $user->profile->title }}</div>
          <div>{{ $user->profile->description }}</div>
          <a href="{{ $user->profile->url }}">{{ $user->profile->url }}</a>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>

  <div class="row">
    @foreach($user->posts as $post)
    <div class="col-4 pb-4">
      <a href="{{ route('post.show', $post) }}">
        <img src="/storage/{{ $post->image }}" class="w-100">
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection