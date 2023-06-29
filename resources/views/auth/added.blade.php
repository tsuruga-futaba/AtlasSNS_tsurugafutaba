@extends('layouts.logout')

@section('content')

<div id="clear">
  <p> {{ Session::get('name') }} さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection


<!--①送る：controller ②受け取る：　③表示する：added.blade
-->
