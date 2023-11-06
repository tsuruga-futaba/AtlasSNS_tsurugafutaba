@extends('layouts.login')
@csrf
@section('content')
<!--バリデーションエラーメッセージ-->

<div class=post-wrapper>
 <div class="post-wrapper-a">
  @if($errors->any())
    <div class="post_error">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {!! Form::open(['url' => '/top','class'=>'form-wrapper']) !!}
    <ul class=post-form>
      <li class="icon"><img src="{{asset('storage/'.Auth::user()->images)}}"></li>
      <li class="post-input">{{ Form::input('textarea','post',null,['placeholder' => '投稿内容を入力してください。','rows' => '3','class'=>'post_input'] )}}</li>
      {{ Form::input('hidden','user_id',Auth::user()->id)}}
      <li class="submit_btn">{{ Form::button('<img src="images/post.png" alt="Submit">',['type'=>'submit'])}}</li>
    </ul>
  {!! Form::close() !!}

  <div class="table table-hover post-content">
    <!-- 投稿一覧 -->
    @foreach($list as $list)
      <div class="post-list">
          <div class="post-a">
            <p class="icon"><img src="{{asset('storage/'.$list->user->images)}}"></p>
          </div>
          <div class="post-b">
            <p>{{$list ->user ->username }}</p>
            <p class="post-content">{{$list ->post}}</p>
          </div>
          <div class="post-c">
              <p>{{$list ->created_at}}</p>
              @if(Auth::user()==$list ->user)
              <div class="post-c-btn">
                <!-- 更新用 -->
                <p><a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="./images/edit.png" alt="編集"></a></p>
                <!-- 消去用 -->
                <p><a class="btn btn-trash" href="/post/{{$list->id}}/delete" onclick="return confirm(
                'この投稿を削除します。よろしいですか？')"><img src="./images/trash-h.png" alt="消去1"><img src="./images/trash.png" alt="消去2"></a></p>
              </div>
              @endif
            </div>
      </div>
   @endforeach
  </div>
 </div>

   <!-- モーダルの中身 -->
 <div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
   <div class="modal__content">
    <form action="/post/update" method="post">
     @csrf
     <textarea name="upPost" class="modal_post"></textarea>
     <input type="hidden" name="id" class="modal_id" value="">
     <input type="image" src="./images/edit.png" alt="編集">
     </form>
    <!-- <a class="js-modal-close" href="">閉じる</a> -->
  </div>
 </div>
</div>

@endsection
