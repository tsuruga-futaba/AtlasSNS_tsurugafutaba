<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //バリデーション成功、通過後の値を$requestにいれていく
    public function register(RegisterFormRequest $request)
    {
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');
            // dd($username);

            //セッション　値を保存
            $request->session()->put('name', $username);

            User::create([
                'username' => $username,
                'mail' => $mail,
                'password' => bcrypt($password),
            ]);




            return redirect('added');

            //$validated = $request->validated();
    }

    //get送信の時（ログイン画面から登録画面へ遷移するとき）の処理
    //ルーティングもメソッド名変更しているか必ず確認！
    public function registerView()
    {
        return view('auth.register');
    }


    public function added(){

        return view('auth.added');
        //echo $request->session()->get('name');
    }

    //public function
}
