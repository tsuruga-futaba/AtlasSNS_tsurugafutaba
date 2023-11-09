@extends('layouts.login')

@section('content')

<div class="search-form">
  <form action="/search" method="post">
    @csrf
    <input type="search" name="keyword"  class="form-control"
    placeholder="ユーザー名" value="@if(isset($keyword)){{$keyword}}@endif">
    <button type="submit" class=""><img src="./images/search.png"> </button>
  </form>
  <!-- 検索ワードを表示 -->
  @if(!empty($keyword))
    <p class="search-keyword">検索ワード : {{$keyword}}</p>
  @endif

</div>

<!-- 保存されているユーザー一覧 -->
<div class="container-list">
  <div class="user-wrapper">
    @foreach($users as $user)
    <!-- 自分以外のユーザーを表示 -->
    @if(!(Auth::user()==$user))
    <div class="user-list">
      <p class="icon"><img src="{{asset('storage/'.$user->images)}}" alt="ユーザーアイコン"></p>
      <p class="username">{{$user->username}}</p>
      <p class="follow-btn">
        @if(auth()->user()->isFollowing($user->id))
      <button type="button" class="btn btn-danger">
        <a href="{{route('un-follow',['user_id'=> $user->id])}}" class="btn un-follow_btn">フォロー解除</a></button>
      @else
      <!-- フォロー機能 -->
      <button type="button" class="btn btn-primary">
      <a href="{{route('follow',['user_id'=> $user->id])}}" class="btn follow_btn">フォローする</a></button>
      @endif
      </p>
    </div>
    @endif
    @endforeach
    </div>
</div>

 @endsection
