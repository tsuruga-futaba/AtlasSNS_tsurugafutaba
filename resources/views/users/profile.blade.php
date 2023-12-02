@extends('layouts.login')
@section('content')
<div class="profile-wrapper">
  <div class="profile-main">
    <div class="pro-icon">
      <p class="icon"><img src="{{asset('storage/'.$users->images)}}"></p>
    </div>
    <div class="pro-name-bio">
      <div class="pro-name">
        <p class="label">name</p>
        <p>{{$users->username}}</p>
      </div>
      <div class="pro-bio">
        <p class="label">bio</p>
        <p>{{$users->bio}}</p>
      </div>
    </div>
    <div class="pro-btn">
      @if(!(Auth::user()==$users))
      <p> @if(auth()->user()->isFollowing($users->id))
      <button type="button" class="btn btn-danger">
      <a href="{{route('un-follow-pro',['user_id'=> $users->id])}}" class="btn un-follow_btn">フォロー解除</a></button>
      @else
      <button type="button" class="btn btn-primary">
      <a href="{{route('follow-pro',['user_id'=> $users->id])}}" class="btn follow_btn">フォローする</a></button>
      @endif</p>
      @endif
    </div>
  </div>
  <div class="table table-hover post-content">
    @foreach($posts as $post)
    <div class="post-contents post-list">
      <div class="post-a">
        <p class="icon"><img src="{{asset('storage/'.$post->user->images)}}"></p >
      </div>
      <div class="post-b">
        <p>{{$post ->user ->username }}</p>
        <p >{{$post->post}}</p >
      </div>
      <div class="post-c">
        <p >{{$post->created_at}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
