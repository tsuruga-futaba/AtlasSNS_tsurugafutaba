<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Validation\Rule;

class ProfileEditRequest extends FormRequest
{
    protected$fillable=[
        'id',
        'username',
        'mail',
        'password',
        'bio',
        'images'
    ];

    public function authorize()
    {
        return true;
    }

    //バリデーション設定
    public function rules()
    {
        return ['username'=>'required|between:2,12',
                'mail'=>['required',
                'between:5,40',
                'email',
                Rule::unique('users','mail')->ignore(auth()->id(),'id'),
            ],
                'password'=>'required|between:8,20|alpha_num|confirmed',
                'password_confirmation'=>'required|alpha_num',
                'bio'=>'max:150|nullable',
                'images' => 'mimetypes:image/jpeg,image/png,image/bmp,image/gif,image/svg+xml|nullable'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'ユーザー名は入力必須です。',
            'username.between' => 'ユーザー名は2文字以上12文字以下で入力してください。',
            'mail.required' => 'メールアドレスは入力必須です。',
            'mail.between' => 'メールアドレスは5文字以上40文字以下で入力してください。',
            'mail.unique' => 'こちらのメールアドレスはすでに使用されています',
            'mail.email' => 'メールアドレスを正しく入力してください。',
            'password.required' => 'パスワードは入力必須です。',
            'password.between' => 'パスワードは8文字以上20文字以下で入力してください。',
            'password.alpha_num' => 'パスワードは英数字のみでご入力ください。',
            'password.confirmed' => 'パスワードが一致しません。',
            'bio.max' => 'Bioは150文字以内で入力してください。',
            'images.mimetypes' => 'jpg,png,bmp,gif,svg以外はアップロードできません。'
        ];
    }
}
