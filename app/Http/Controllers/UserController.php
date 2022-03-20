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

    // 引数でUserRegistPostクラスのインスタンスを渡す
    public function register(Request $request)
    {
        // すべての入力値を取得し$inputsに保持する
        $inputs = $request->all();
        
        // バリデーションルールを定義する
        // nameキーの値は必須とし、ageは整数型とする
        $rules = [
            'name' => 'required',
            'age' => 'integer',
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