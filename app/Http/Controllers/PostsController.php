<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Http\Requests\PostRequest;
class PostsController extends Controller
{
    //
    public function index(){
        $list = Post::get();
        return view('posts.index',['post'=>$list]);

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
        Post::where('id',$id)->update(['post'=>$up_post]);
        return redirect('/top');
    }
}
