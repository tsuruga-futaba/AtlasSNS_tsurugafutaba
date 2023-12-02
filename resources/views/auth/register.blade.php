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
      <p>{{ Form::label('user name') }}</p>
      <p>{{ Form::text('username',null,['class' => 'input']) }}</p>

      <p>{{ Form::label('mail address') }}</p>
      <p>{{ Form::text('mail',null,['class' => 'input']) }}</p>

      <p>{{ Form::label('password') }}</p>
      <p>{{ Form::text('password',null,['class' => 'input']) }}</p>

      <p>{{ Form::label('password confirm') }}</p>
      <p>{{ Form::text('password_confirmation',null,['class' => 'input']) }}</p>
    </div>
    <p class=login-btn>{{ Form::submit('REGISTER',['class'=>'btn btn-danger']) }}</p>

    <p class=register-btn><a href="/login">ログイン画面へ戻る</a></p>

    {!! Form::close() !!}
</div>
</div>
@endsection
