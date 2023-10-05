<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // アクションの実行前にログを実行する
        file_put_contents(
            '/Users/takeshi-arihori/Documents/learning/laravel/example-test/access.log',
            date('Y-m-d H:i:s') . "\n",
            FILE_APPEND
        );

        // a. アクションを実行
        $response = $next($request);
        // b. レスポンスの内容を加工
        // $response->setContent(mb_strtoupper($response->content()));
        return $response;
    }
}
