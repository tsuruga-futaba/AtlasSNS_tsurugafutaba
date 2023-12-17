@extends('layouts.login')
@section('content')
<div class="follow-wrapper">
  <div class="follow-list-wrapper">
    <h1>Follower list</h1>
    <!-- アイコン表示(書きかけ) -->
    <div class="icon-list">
      @foreach($images as $image)
      <p><a href="{{route('profile',['user_id'=> $image ->id])}}" class="icon">
          @if ($image->images == 'icon1.png')
            <img src="{{asset('/images/icon1.png')}}">
          @else
            <img src="{{asset('storage/'.$image->images)}}">
          @endif
      </a></p>
      @endforeach
    </div>
  </div>
  <!-- 投稿一覧表示 -->
  <div class="table table-hover post-content">
    @foreach($posts as $post)
    <div class="post-list post-contents">
      <div class="post-a">
        <p class="icon"><a href="{{route('profile',['user_id'=> $post->user_id])}}" class="">
          @if ($post->user->images == 'icon1.png')
            <img src="{{asset('/images/icon1.png')}}">
          @else
            <img src="{{asset('storage/'.$post->user->images)}}">
          @endif
        </a></p>
      </div>
      <div class="post-b">
        <p>{{$post->user->username}}</p>
        <p>{{$post->post}}</p>
      </div>
      <div class="post-c">
      <p>{{$post->created_at}}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
