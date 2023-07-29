@extends('layouts.login')

@section('content')

<div class="search-form">
  <form action="/search" method="get">
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
    @foreach($users->$user)
    <!-- 自分以外のユーザーを表示 -->
    @if(!($user->username == $users->username))
    <tr>
      <td>(($users->username))</td>
      <td><img src="{{$users->images}}" alt="ユーザーアイコン"></td>
    </tr>
    @endif
    @endforeach
    </table>
</div>

 @endsection
