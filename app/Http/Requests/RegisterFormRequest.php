<?php

namespace App\Http\Requests;
//Usermodelの使用を宣言
use App\User;
use Illuminate\Foundation\Http\FormRequest;


class RegisterFormRequest extends FormRequest
{

    protected $fillable = [
        'username',
        'mail',
        'password'
    ];


    public function authorize()
    {
        return true;
    }

    //@return array

    //バリデーション設定
    public function rules()
    {
        return ['username'=>'required|between:2,12',
                'mail'=>'required|between:5,40|unique:users,mail|email',
                'password'=>'required|between:8,20|alpha_num|confirmed',
               ];
    }

    public function messages()
    {
        return[
            'username.required' =>'ユーザー名は入力必須です。',
            'username.between'=>'ユーザー名は2文字以上12文字以下で入力してください。',
            'mail.required'=>'メールアドレスは入力必須です。',
            'mail.between'=>'メールアドレスは5文字以上40文字以下で入力してください。',
            'mail.unique'=>'こちらのメールアドレスはすでに使用されています',
            'mail.email'=>'メールアドレスを正しく入力してください。',
            'password.required'=>'パスワードは入力必須です。',
            'password.between'=>'パスワードは8文字以上20文字以下で入力してください。',
            'password.alpha_num'=>'パスワードは英数字のみでご入力ください。',
            'password.confirmed'=>'パスワードが一致しません。'
        ];
    }
}
