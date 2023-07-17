<?php

namespace App\Http\Requests;
use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    protected $fillable = [
        'post',
        'user_id'
    ];
    public function authorize()
    {
        return true;
    }

    //@return array
    public function rules()
    {
         return [
            'post'=>'required|between:2,150',
        ];

    }
    public function messages()
    {
         return [
            'post.required'=>'投稿は入力必須です。',
            'post.between'=>'投稿は2文字以上150文字以内で入力してください。'
        ];
    }
}
