<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface;

use function info;
use function strval;

class HeaderDumper
{
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function handle(Request $request, Closure $next)
    {
        $this->logger->info(
            'request',
            [
                'header' => strval($request->headers)
            ]
        );
        // ヘルパー関数を利用する場合は以下の通りです
        // info('request', ['header' => strval($request->header())]);
        $response = $next($request);
        $this->logger->info(
            'response',
            [
                'header' => strval($response->headers)
            ]
        );
        return $response;
    }
}
