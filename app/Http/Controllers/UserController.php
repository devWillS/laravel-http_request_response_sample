<?php

declare(strict_types=1);

namespace App\Http\Controllers;

// Requestクラスをインポートする
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        return csrf_token(); 
    }

    // 引数でRequestクラスのインスタンスを渡す
    public function register(Request $request)
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