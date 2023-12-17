@extends('layouts.login')
@section('content')
<!-- プロフィール編集画面 -->
<div class="profile-edit-wrapper">
  <p class="icon">
        @if (Auth::user()->images == 'icon1.png')
          <img src="{{asset('/images/icon1.png')}}">
        @else
          <img src="{{asset('storage/'.Auth::user()->images)}}">
        @endif
  </p>
  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/profile_edit', 'enctype' => 'multipart/form-data']) !!}
  <div class="edit-wrapper">
    <div class="edit-parts">
      {{ Form::label('user name') }}
      {{ Form::text('username',Auth::user()->username,['class' => 'input edit-box']) }}
    </div>
    <div class="edit-parts">
      {{ Form::label('mail address') }}
      {{ Form::text('mail',Auth::user()->mail,['class' => 'input edit-box']) }}
    </div>
    <div class="edit-parts">
      {{ Form::label('password') }}
      {{ Form::password('password',[null,'class' => 'input edit-box']) }}
    </div>
    <div class="edit-parts">
      {{ Form::label('password confirm') }}
      {{ Form::password('password_confirmation',[null,'class' => 'input edit-box']) }}
    </div>
    <div class="edit-parts">
      {{ Form::label('bio')}}
      {{Form::text('bio',Auth::user()->bio,['class' => 'input edit-box'])}}
    </div>
    <div class="edit-parts">
      {{ Form::label('icon image')}}
      {{ Form::file('images',['class' => 'input edit-box'])}}
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
