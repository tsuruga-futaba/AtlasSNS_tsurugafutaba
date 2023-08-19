<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(Int $user_id){
        //リンク元のidを元にユーザー情報を取得
        $users = User::where('users.id', $user_id)->first();
        // dd($users);
        //リンク元ユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('posts.user_id', [$user_id])->get();
        // dd($posts);
        return  redirect()->route('profile',['user_id'=>$user_id])->with('users',$users)->with('posts',$posts);
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
    }
