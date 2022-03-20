<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return csrf_token(); 
    }

    public function register(Request $request)
    {
        // すべての入力値を取得し$inputsに保持する
        $inputs = $request->all();
        
        // バリデーションルールを定義する
        // nameキーの値は必須とし、ageは整数型とする
        $rules = [
            'name' => 'required', // 必須項目である
            'email' => ['required','email'],  // 藍列で指定（必須かつメールアドレスであること）
            'age' => 'required|integer', // パイプラインで区切る（必須かつ整数値）

            'user_no' => 'numeric', // 数値であることを確認
            'alpha' => 'alpha', // 全て英字であることを確認
            'email' => "email", // メールアドレス形式であることを確認
            'ip_address' => 'ip', // IPアドレス形式であることを確認

            'bank_pass' => 'digits:4', // 4桁の数値
            'signal_color' => 'in:green,red,yellow', // 3種のうちいずれかであることを確認

            'number' => ['integer', 'size:10'], // 10であることを確認
            'name' => 'size:10', // 10文字であることを確認
            'button' => ['array', 'size:10'], // 要素数10であることを確認
            'upload' => ['file', 'size:10'], // ファイルサイズ10KBであることを確認

            'user_id' => 'regex:/^[0-9a-zA-Z]+$/', // 半角英数字

            'email' => 'confirmed', // emailとemail_confirmationが同値であることを確認

            'name' => 'unique:users', // usersテーブルの同名カラム(name)と比較して重複しないことを確認
            'mail' => 'unique:users,email', // usersテーブルのemailカラムとmailフィールドの値を比較して重複しないことを確認
            'mail' => 'unique:users,email,100', // 上記と同じルールだが,idが100のレコードは重複を許可する

            'email' => ['bail', 'required'], // bailルールを使うと、バリデーションエラーの場合に以降のバリデーションを行わない
            'name' => ['required', 'max:255'],
        ];

        // バリデータクラスのインスタンスを取得
        $validator = Validator::make($inputs, $rules);

        if ($validator->fails()) {
            Log::info("UserController validator error"); 
            return "validator error";
        }

        Log::info("UserController validator success");
        return "validator success";
    }
}

?>