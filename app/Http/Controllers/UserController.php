<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistPost;
use App\Http\Requests\UserRegistPostApi;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
        // name のバリデーションに「ascii_alpha」を追加
        $rules = [
            'name' => ['required', 'max:20', 'ascii_alpha'],
            'email' => ['required', 'email', 'max:255'],
        ];

        $inputs = $request->all();
        Log::info("UserController", ["inputs" =>$inputs]);

        // バリデーションルールに「ascii_alpha」を追加
        Validator::extend('ascii_alpha', function($attribute, $value, $parameters) {
            // 半角アルファベットならtrue（バリデーションOK）とする
            return preg_match('/^[a-zA-Z]+$/', $value);
        });
        
        $validator = Validator::make($inputs, $rules);
        $validator->sometimes(
            'age',
            'required|integer|min:18',
            function ($inputs) {
                // メールマガジン（mailmagazine）を受け取る（allow）入力があった場合、「age」フィールドに対して「必須かつ18以上の整数値」のバリデーションルールを追加
                Log::info("UserController", ["mailmagazine" =>$inputs->mailmagazine]);
                Log::info("UserController", ["mailmagazine" =>$inputs->mailmagazine === 'allow']);
                return $inputs->mailmagazine === 'allow';
            }
        );

        if ($validator->fails()) {
            // ここにバリデーションエラーの場合の処理
            return "error";
        }
        // ここにバリデーション通過後の処理
        $name = $request->input('name');
        
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