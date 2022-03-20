<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;

final class RequestAction
{
    public function __invoke()
    {
        // "name"キーでリクエストから値を取得する
        $name = Request::get('name');
        Log::info("RequestAction", ["name" => $name]);
        // "name"キーがない場合、「guest」を返す
        $name = Request::get('name', 'guest');
        Log::info("RequestAction", ["name" => $name]);


        // すべての入力値を$inputsで取得
        $inputs = Request::all();
        Log::info("RequestAction", ["inputs" =>$inputs]);

        // 配列で指定した入力値のみ取得し、値を取り出す
        $inputs = Request::only(['name', 'age']);
        Log::info("RequestAction", ["inputs" => $inputs]);
        $name = $inputs['name'];
        Log::info("RequestAction", ["name" => $name]);

        // アップロードされたファイルを取得し、$contentに読み込む
        $file = Request::file('material.png');
        if (!empty($file)) {
            $contetnt = file_get_contents($file->getRealPath());
        }

        // クッキーの値を取得
        $name = Request::cookie('name');
        Log::info("RequestAction", ["name" => $name]);
        // ヘッダ値を取得
        $acceptLangs = Request::header('Accept-Language');
        Log::info("RequestAction", ["acceptLangs" => $acceptLangs]);
        // 全サーバ値を取得
        $serverInfo = Request::server();
        Log::info("RequestAction", ["serverInfo" => $serverInfo]);

        return $name;
    }

}

?>