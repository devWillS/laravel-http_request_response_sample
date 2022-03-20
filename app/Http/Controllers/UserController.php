<?php

declare(strict_types=1);

namespace App\Http\Controllers;

// FormRequestクラスをインポートする
use App\Http\Requests\UserRegistPost;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return csrf_token(); 
    }

    // 引数でUserRegistPostクラスのインスタンスを渡す
    public function register(UserRegistPost $request)
    {
        // インスタンスに対して値を問い合わせ
        $name = $request->get('name');
        $age = $request->get('age');
        Log::info('UserController', ["name" => $name]);
        Log::info('UserController', ["age" => $age]);

        return $name;
    }
}

?>