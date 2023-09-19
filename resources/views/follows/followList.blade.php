@extends('layouts.login')

@section('content')

<h1>Follow list</h1>
<!-- アイコン表示(書きかけ) -->
<table>
@foreach($images as $image)
  <td><a href="{{route('profile',['user_id'=> $image ->id])}}" class=""><img src="{{asset('storage/'.$image->images)}}"></a></td>
@endforeach
</table>

<!-- 投稿一覧表示 -->
<table>
@foreach($posts as $post)
<tr class="post-contents">
<td><a href="{{route('profile',['user_id'=> $post->user_id])}}" class=""><img src="{{asset('storage/'.$post->user->images)}}"></a></td>
<td>{{$post->user->username}}</td>
<td>{{$post->post}}</td>
<td>{{$post->created_at}}</td>
</tr>
@endforeach
</table>

@endsection
