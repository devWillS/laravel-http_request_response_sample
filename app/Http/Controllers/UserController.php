<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistPost;
use App\Http\Requests\UserRegistPostApi;

class UserController extends Controller
{
    public function index()
    {
        return csrf_token(); 
    }

    public function create()
    {
        return view('regist.register');
    }

    public function createForm()
    {
        return view('regist.registerForm');
    }

    public function register(Request $request)
    {
        // 下記のルールを配列で指定
        // name は必須、最大20文字
        // email は必須、メールアドレスルールに沿っている、最大255文字
        $rules = [
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
        ];

        // バリデーションの実行
        // エラーの場合は直前の画面にリダイレクト
        $this->validate($request, $rules);

        // ここにバリデーション通過後の処理
        $name = $request->get('name');

        return $name;
    }

    public function registerForm(UserRegistPost $request)
    {
        // ここに来るまでにバリデーション判定が行われている

        // ここにバリデーション通過後の処理
        $name = $request->get('name');

        return $name;
    }

    public function registerApi(UserRegistPostApi $request)
    {
        // ここに来るまでにバリデーション判定が行われている

        // ここにバリデーション通過後の処理
        $name = $request->get('name');

        Log::info("UserController $name");
        return $name;
    }
}

?>