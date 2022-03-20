<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;

use function response;
use function view;

class ViewAction extends Controller
{
    public function __invoke(Request $request)
    {
        $response = Response::view('view.file');

        // 上記のメソッドと同じ結果が得られる
        $response = view('view.file');

        // ステータスコードを変更し、ビューを出力する
        $response = response(view('view.file'),IlluminateResponse::HTTP_ACCEPTED);
        
        return $response;
    }
}

?>