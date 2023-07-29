<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
     // ユーザー一覧をページネートで取得
    public function search(){
        $users = User::paginate(20);
        // ビューにusersとsearchを変数として渡す
        return view('users.search')->with(['users=>$users']);
    }
    // ユーザー検索の処理を実装する
    public function searchView(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = User::query();

        // dd($username);
        if(!empty($keyword)){
            $query -> orwhere('username', 'like', '%' . $keyword . '%')->get();
        }

        // 全件取得＋ページネーション
            $data=$query->orderBy('created_at', 'desc')->paginate(5);
            return view('users.search')->with('data',$data)->with('keyword',$keyword);

        }
    }
