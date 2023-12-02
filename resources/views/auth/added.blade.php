@extends('layouts.logout')
@section('content')
<div class='main-wrapper'>
  <div class="login-container">
    <div id="clear">
      <p class='welcome-text'> {{ Session::get('name') }} さん</p>
      <p class='welcome-text'>ようこそ！AtlasSNSへ</p>
      <p>ユーザー登録が完了しました。</p>
      <p>早速ログインをしてみましょう。</p>
      <p class='register-btn btn btn-danger'><a href="/login">ログイン画面へ</a></p>
    </div>
  </div>
</div>
@endsection
<!--①送る：controller ②受け取る：　③表示する：added.blade
-->
