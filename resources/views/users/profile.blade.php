@extends('layouts.login')
@section('content')
<div>
  <p>{{$users->images}}</p>
  <p>{{$users->username}}</p>
  <p>{{$users->bio}}</p>
</div>



@endsection
