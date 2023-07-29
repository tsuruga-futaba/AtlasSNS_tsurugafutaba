@extends('layouts.login')
@csrf
@section('content')

<!-- <h2>機能を実装していきましょう。</h2> -->
<!--バリデーションエラーメッセージ-->
@if($errors->any())
<div class="post_error">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<div class=post-form>
  <div class="icon"><img src="images/icon1.png"></div>
{!! Form::open(['url' => '/top']) !!}


{{ Form::input('textarea','post',null,['placeholder' => '投稿内容を入力してください。','rows' => '3','class'=>'post_input'] )}}

{{ Form::input('hidden','user_id',Auth::user()->id)}}

<button type="submit" class="submit_btn"><img src="images/post.png"></button>
<!-- {{ Form::button('<img src="images/post.png" alt="Submit">',['type'=>'submit','class'=>'submit_btn'])}} -->
{!! Form::close() !!}
</div>

@foreach($list as $list)
<table class="table table-hover">
  <tr>
    <td>{{$list ->user ->username }}</td>
     <td class="icon"><img src="images/icon1.png"></td>
    <!-- <td>{{$list ->user ->images}}</td> -->
    <td>{{$list ->post}}</td>
    <td>{{$list ->created_at}}</td>
    <!-- 更新用 -->
    <td><div class="contents">
      <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="./images/edit.png" alt="編集"></a>
    </div></td>
    <!-- 消去用 -->
    <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm(
      'この投稿を削除します。よろしいですか？')"><img src="./images/trash-h.png" alt="消去1"><img src="./images/trash.png" alt="消去2"></a></td>
  </tr>
  @endforeach
</table>

   <!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update" method="post">
            @csrf
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
                <input type="submit" value="更新">
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

@endsection
