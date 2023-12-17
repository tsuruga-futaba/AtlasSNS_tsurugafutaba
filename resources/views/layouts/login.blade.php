<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>


    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!-- <link rel="stylesheet" href="../../../public/css/style.css "> -->
    <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>


<!--------------------------------------------------->
<body>
  <header>
    <p class="logo-size"><a href='/top'><img class="logo-size" src="{{asset('/images/atlas.png')}}"></a></p>
    <div class="side_user">
      <ul class=" menu-title js-menu-title">
        <!--ユーザー名-->
        <li class="user_name">{{Auth::user()->username}}さん</li>
        <!-- 矢印 -->
        <li class="accordion-title js-accordion-title"></li>
        <!-- アイコン -->
        <li class="icon">
          @if (Auth::user()->images == 'icon1.png')
            <img src="{{asset('/images/icon1.png')}}">
          @else
            <img src="{{asset('/storage/'.Auth::user()->images)}}">
          @endif
        </li>
      </ul>
      <!--アコーディオンメニューの設置-->
      <!--メニュー画面-->
      <div class="accordion-contents">
        <ul class="accordion-wrapper">
          <li><a class="home" href="/top">HOME</a></li>
          <li><a class="profile" href="/profile_edit">プロフィール編集</a></li>
          <li><a class="center" href="/logout">ログアウト</a></li>
        </ul>
      </div>
    </div>
  </header>
  <!--サイドバー部分-->
  <div id="row">
    <div id="container">
      @yield('content')
    </div>
    <div id="side-bar">
      <div id="confirm">
        <p>{{Auth::user()->username}}さんの</p>
        <p>フォロー数{{Auth::user()->follows()->get()->count()}}名</p>
        <p><a class="btn btn-primary follows-btn" href="/follow-list" role="button">フォローリスト</a></p>
        <p>フォロワー数{{Auth::user()->follower()->get()->count()}}名</p>
        <p><a class="btn btn-primary follows-btn" href="/follower-list" role="button">フォロワーリスト</a></p>
      </div>
      <div class="user_search search">
        <a class="btn btn-primary" href="/search" role="button">ユーザー検索</a>
      </div>
    </div>
  </div>
  <footer>
  </footer>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="{{asset('js/script.js')}}"></script>
  <script src="../../../public/js/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
