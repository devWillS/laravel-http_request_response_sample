<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function response;

final class DownloadAction extends Controller
{
    public function __invoke(Request $request)
    {
        $path = storage_path().'/data/diagram.pdf';

        $response = Response::download($path);

        // ヘルパー関数を利用する場合
        $response = response()->download($path);

        // content-typeを指定
        $response = response()->download(
            $path,
            'diagram.pdf',
            [
                'content-type' => 'application/pdf'
            ]
        );
        
        return $response;
    }
}

?>