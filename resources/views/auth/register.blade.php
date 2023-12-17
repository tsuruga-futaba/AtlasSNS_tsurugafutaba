@extends('layouts.logout')
@section('content')
<!--バリデーションエラーメッセージ-->
@if($errors->any())
<div class="register_error">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<!-- 適切なURLを入力してください -->
<div class='main-wrapper'>
  <div class='register-container'>
    {!! Form::open(['url' => '/register', 'enctype' => 'multipart/form-data']) !!}
    <p class=register>新規ユーザー登録</p>
    <div class=register-form>
      {{ Form::label('user name') }}
      {{ Form::text('username',null,['class' => 'input']) }}

      {{ Form::label('mail address') }}
      {{ Form::text('mail',null,['class' => 'input']) }}

      {{ Form::label('password') }}
      {{ Form::password('password',null,['class' => 'input']) }}

      {{ Form::label('password confirm') }}
      {{ Form::password('password_confirmation',null,['class' => 'input']) }}
    </div>
    <p class=login-btn>{{ Form::submit('REGISTER',['class'=>'btn btn-danger']) }}</p>

    <p class=register-btn><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
</div>
</div>
@endsection
