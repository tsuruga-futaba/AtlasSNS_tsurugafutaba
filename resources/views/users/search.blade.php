@extends('layouts.login')

@section('content')

<div class="search-form">
  <form action="/search" method="post">
    @csrf
    <input type="search" name="keyword"  class="form-control"
    placeholder="ユーザー名" value="@if(isset($keyword)){{$keyword}}@endif">
    <button type="submit" class=""><img src="./images/search.png"> </button>
  </form>
</div>

<!-- 検索ワードを表示 -->
@if(!empty($keyword))
<p>検索ワード:{{$keyword}}</p>
@endif

<!-- 保存されているユーザー一覧 -->
<div class="container-list">
  <table class="table table-hover">
    @foreach($users as $user)
    <!-- 自分以外のユーザーを表示 -->
    @if(!(Auth::user()==$user))
    <tr>
      <td><img src="{{$user->images}}" alt="ユーザーアイコン"></td>
      <td>{{$user->username}}</td>
      <td>
        @if(auth()->user()->isFollowing($user->id))
      <a href="{{route('un-follow',['user_id'=> $user->id])}}" class="btn un-follow_btn">フォロー解除</a>
      @else
      <a href="{{route('follow',['user_id'=> $user->id])}}" class="btn follow_btn">フォローする</a>
      @endif
      </td>
    </tr>
    @endif
    @endforeach
    </table>
</div>

 @endsection
