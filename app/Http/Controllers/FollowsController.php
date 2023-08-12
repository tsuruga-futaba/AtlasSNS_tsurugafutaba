<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
use App\Post;
use Auth;
use FollowsTableSeeder;

class FollowsController extends Controller
{
    public function followList(){
        //フォローしているユーザーのidを取得
        $following_id = Auth::user()->follows()->pluck('followed_id');
        //   dd($following_id);
        //フォローしているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('posts.user_id', $following_id)->get();
        // dd($posts);
        return view('follows.followList', compact('posts'))->with('posts',$posts);
    }
    public function followerList(){
        //フォローされているユーザーのidを取得
        $followed_id = Auth::user()->follower()->pluck('following_id');
        //    dd($followed_id);
        //フォローされているユーザーのidを元に投稿内容を取得
        $posts = Post::with('user')->whereIn('posts.user_id', $followed_id)->get();
        // dd($posts);
        return view('follows.followerList', compact('posts'))->with('posts',$posts);
    }
    public function unFollow( $user_id)
    {
        //フォローしているか
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user_id);

        //フォローしていれば下記のフォロー解除を実行する
        if($is_following){
            //自分のユーザーIDを取得する
           $loggedInUserId = auth()->user()->id;
            //フォローの解除（フォローテーブルから削除）
            // dd($user_id);
            // dd($loggedInUserId);
            Follow::where([
                ['followed_id', $user_id],
                ['following_id',$loggedInUserId],
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
