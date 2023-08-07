<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }
    public function unFollow($user_id)
    {
        //フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user_id);

        //フォローしていれば下記のフォロー解除を実行する
        if($is_following){
            //自分のユーザーIDを取得する
           $loggedInUserId = auth()->user()->id;
            //フォローの解除（フォローテーブルから削除）
            Follow::where([
                ['followed_id', '=', '$user_id'],
                ['following_id', '=', '$loggedInUserId'],
            ])
                ->delete();
        }
        //戻る
        return redirect('/search');
    }
    public function follow($user_id)
    {
        //フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user_id);
        //フォローしていなかったら下記のフォロー処理を実行
        if(!$is_following){
            //自分のユーザーIDを取得
            $loggedInUserId = auth()->user()->id;
            //フォローしたい人のユーザーIDを元にユーザーを取得
            $followedUser = User::find($user_id);
            $followedUserId =$followedUser->id;

            Follow::create([
                'following_id' => $loggedInUserId,
                'followed_id' => $followedUserId,
            ]);
            return redirect('/search');

        }
    }
}
