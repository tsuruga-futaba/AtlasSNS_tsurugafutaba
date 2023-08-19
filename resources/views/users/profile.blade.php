@extends('layouts.login')
@section('content')
<div>
  <div>
  <p>{{$users->images}}</p>
  <p>{{$users->username}}</p>
  <p>{{$users->bio}}</p>
  @if(!(Auth::user()==$users))
  <p> @if(auth()->user()->isFollowing($users->id))
      <a href="{{route('un-follow-pro',['user_id'=> $users->id])}}" class="btn un-follow_btn">フォロー解除</a>
      @else
      <a href="{{route('follow-pro',['user_id'=> $users->id])}}" class="btn follow_btn">フォローする</a>
      @endif</p>
      @endif
  </div>
  <div>
    @foreach($posts as $post)
   <tr class="post-contents">
   <td>{{$post->user->images}}</td>
   <td>{{$post->post}}</td>
   <td>{{$post->created_at}}</td>
   </tr>
   @endforeach
  </div>
</div>




@endsection
