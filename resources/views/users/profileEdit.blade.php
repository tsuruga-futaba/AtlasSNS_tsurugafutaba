@extends('layouts.login')
@section('content')

<!-- プロフィール編集画面 -->

<div class="profile-edit-wrapper">

<p class="icon"><img src="{{asset('storage/'.Auth::user()->images)}}"></p>


<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/profile_edit', 'enctype' => 'multipart/form-data']) !!}
<div class="edit-wrapper">
<div class="edit-parts">
<p>{{ Form::label('user name') }}</p>
<p class="edit-box">{{ Form::text('username',Auth::user()->username,['class' => 'input']) }}</p>
</div>

<div class="edit-parts">
<p>{{ Form::label('mail address') }}</p>
<p class="edit-box">{{ Form::text('mail',Auth::user()->mail,['class' => 'input']) }}</p>
</div>

<div class="edit-parts">
<p>{{ Form::label('password') }}</p>
<p class="edit-box">{{ Form::password('password',null,['class' => 'input']) }}</p>
</div>

<div class="edit-parts">
<p>{{ Form::label('password confirm') }}</p>
<p class="edit-box">{{ Form::password('password_confirmation',null,['class' => 'input']) }}</p>
</div>

<div class="edit-parts">
<p>{{ Form::label('bio')}}</p>
<p class="edit-box">{{Form::text('bio',Auth::user()->bio,['class' => 'input'])}}</p>
</div>

<div class="edit-parts">
<p>{{ Form::label('icon image')}}</p>
<p class="edit-box">{{ Form::file('images',['class' => 'input'])}}</p>
</div>

{{ Form::input('hidden','id',Auth::user()->id)}}

<div class="edit-parts">

{{ Form::submit('更新',['class'=>'btn btn-danger']) }}
</div>
</div>




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

</div>


@endsection
