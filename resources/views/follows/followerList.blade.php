@extends('layouts.login')

@section('content')

<!-- アイコン表示(書きかけ) -->

<!-- 投稿一覧表示 -->
@foreach($posts as $post)

<tr class="post-contents">
<td><a href="{{route('profile',['user_id'=> $post->user_id])}}" class="">{{$post->user->images}}</a></td>
<td>{{$post->user->username}}</td>
<td>{{$post->post}}</td>
<td>{{$post->created_at}}</td>
</tr>

@endforeach

@endsection
