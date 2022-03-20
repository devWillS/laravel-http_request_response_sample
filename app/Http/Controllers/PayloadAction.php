<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

final class PayloadAction
{
    public function __invoke(Request $request)
    {
        // $result_get と　$result_json　には同じ値が入る
        $result_get = $request->get('nested');
        $result_json = $request->json('nested');

        Log::info('PayloadAction result_get', $result_get);
        Log::info('PayloadAction result_json', $result_json);

        return $result_json;
    }
}

?>