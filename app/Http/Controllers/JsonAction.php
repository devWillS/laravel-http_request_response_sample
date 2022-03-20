<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use function response;

class JsonAction extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $response = Response::json(['status' => 'success']);

        // ヘルパー関数を利用する場合
        $response = response()->json(['status' => 'success']);
        
        // 任意のメディアタイプ指定
        $response = response()->json(['message' => 'laravel'], JsonResponse::HTTP_OK, [
            'content-type' => 'application/vnd.laravel-api+json'
        ]);
        return $response;
    }
}

?>