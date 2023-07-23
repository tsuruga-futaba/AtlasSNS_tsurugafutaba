<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use App\Http\Requests\PostRequest;
class PostsController extends Controller
{
    //
    public function index(){
        $list = Post::orderBy('created_at','desc')->get();
        return view('posts.index',['list'=>$list]);
        // $list = Auth::user();


    }
    public function postCreate(PostRequest $request)
    {
        $post = $request->input('post');
        $user_id = $request->input('user_id');
        // dd($user_id);
        Post::create([
            'post' => $post,
        'user_id' => $user_id,
    ]);
    return back();
    }
    public function postUpdate(PostRequest $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        dd($up_post);
        Post::where('id',$id)->update
        (['post'=>$up_post]);

        return redirect('/top');
    }
}
