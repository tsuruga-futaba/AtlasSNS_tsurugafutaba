@extends('layouts.login')
@section('content')

<!-- プロフィール編集画面 -->


<img src="{{asset('storage/'.Auth::user()->images)}}">


<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/profile_edit', 'enctype' => 'multipart/form-data']) !!}


{{ Form::label('user name') }}
{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}

{{ Form::label('mail address') }}
{{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('password confirm') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::label('bio')}}
{{Form::text('bio',Auth::user()->bio,['class' => 'input'])}}

{{ Form::label('icon image')}}
{{ Form::file('images',['class' => 'input'])}}

{{ Form::input('hidden','id',Auth::user()->id)}}


{{ Form::submit('更新') }}

<!--バリデーションエラーメッセージ-->
@if($errors->any())
<div class="edit_error">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif


@endsection
