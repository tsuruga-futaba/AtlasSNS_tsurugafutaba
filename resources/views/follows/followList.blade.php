@extends('layouts.login')

@section('content')

<!-- アイコン表示(書きかけ) -->

<!-- 投稿一覧表示 -->
@foreach($posts as $post)
@if(auth()->user()->isFollowing($user->id))
<tr class="post-contents">
<td><a href="" class="">{{$post->user->images}}</a></td>
<td>{{$post->user->username}}</td>
<td>{{$post->post}}</td>
<td>{{$post->created_at}}</td>
</tr>
@endif
@endforeach

@endsection
