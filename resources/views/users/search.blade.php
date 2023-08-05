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
    @if(isset($user)and!(Auth::user()==$user)and!(isset($keyword)))
    <tr>
      <td><img src="{{$user->images}}" alt="ユーザーアイコン"></td>
      <td>{{$user->username}}</td>
    </tr>
    @elseif(isset($user)and!(Auth::user()==$user)and(isset($keyword)))
    <tr>
      <td><img src="{{ $data->appends(Request::only('keyword'))->images}}" alt="ユーザーアイコン"></td>
      <td> {{ $data->appends(Request::only('keyword'))}}</td>
    </tr>
    @endif
    @endforeach
    </table>
</div>

 @endsection
