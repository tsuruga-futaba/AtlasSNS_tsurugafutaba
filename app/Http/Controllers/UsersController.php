<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Http\Requests\ProfileEditRequest;

class UsersController extends Controller
{
    //
    public function profile(Int $user_id){
        //リンク元のidを元にユーザー情報を取得
        $users = User::where('users.id', $user_id)->first();
        //dd($users);
        //リンク元ユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('posts.user_id', [$user_id])->get();
        //dd($posts);
        return  view('users.profile',['user_id'=>$user_id])->with('users',$users)->with('posts',$posts);
        //redirectはメソッドに飛んで処理を実行する。viewは単純に処理を実行後に記述したviewを表示させる指示をだす。
    }
     // ユーザー一覧をページネートで取得
    public function search(){
        $users = User::paginate(20);
        // ビューにusersとsearchを変数として渡す
        return view('users.search')->with('users',$users);
    }
    // ユーザー検索の処理を実装する
    public function searchView(Request $request)
    {
        $users = User::paginate(20);
        $keyword = $request->input('keyword');
        $query = User::query();
        //  dd($query);

        // dd($username);
        if (!empty($keyword)) { //keywordが入っているとき
            $users = $query->orwhere('username', 'like', '%' . $keyword . '%')->get(); //キーワードを含むユーザー名を取得する
            // ddd($users);
            return view('users.search')->with('keyword', $keyword)->with('users', $users);
        }else{
            $data=$query->orderBy('created_at', 'desc')->paginate(5); // 全件取得＋ページネーション
            return view('users.search')->with('data',$data)->with('keyword',$keyword)->with('users',$users)->with('query',$query);
        }
            //    dd($data);
        }

        public function profileEditView()
        {
        return view('users\profileEdit');
        }

        public function profileEdit(ProfileEditRequest $request){
            $id=$request->input('id');
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            $bio=$request->input('bio');
            // dd($bio);
            $filename=$request->images->getClientOriginalName();
        // dd($filename);
            $images = $request->images->storeAs('user-images','public', $filename);
            // $images = $request->file('images');
            // $imagesPath = $images->store('../../../public/images');
            dd($images);

        User::where('id', $id)->update
        (['username' => $username, 'mail' => $mail, 'password' => $password, 'bio' => $bio, 'images' => $images]);

        return redirect('/top');
        }
    }
