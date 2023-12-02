<!-- <section class=welcome > -->
@extends('layouts.logout')
@section('content')
<div class='main-wrapper'>
  <div class="login-container">
    {!! Form::open(['url' => '/login', 'method' => 'post']) !!}
      @csrf
      <p class='welcome'>AtlasSNSへようこそ</p>
      <div class=login-form>
        <p>{{ Form::label('mail address') }}</p>
        <p>{{ Form::text('mail',null,['class' => 'input']) }}</p>
        <p>{{ Form::label('password') }}</p>
        <p>{{ Form::password('password',['class' => 'input']) }}</p>
      </div>

      <p class=login-btn>{{ Form::submit('LOGIN',['class'=>'btn btn-danger']) }}</p>
      <p class=register-btn><a href="/register">新規ユーザーの方はこちら</a></p>
    {!! Form::close() !!}
  </div>
</div>
@endsection
