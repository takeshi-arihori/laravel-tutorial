<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestCheckController extends Controller
{

    // Requestオブジェクトを確認するためのコントローラー
    public function checkRequestDetails(Request $request)
    {
        // ヘッダー値を取得
        $header = $request->header('key');

        // 指定されたヘッダーが存在するか
        $hasHeader = $request->hasHeader('key');

        // サーバー環境変数を取得
        $server = $request->server('key');

        // アプリの基底URLを取得
        $root = $request->root();

        // リクエストURLを取得（クエリ情報なし）
        $url = $request->url();

        // リクエストURLを取得
        $fullUrl = $request->fullUrl();

        // リクエストパスを取得
        $path = $request->path();

        // リクエストURLが指定のパターンにマッチするか
        $isMatched = $request->is('ptns'); // 'ptns'はマッチさせたいパターンに置き換えてください

        // クライアントのIPアドレスを取得
        $ip = $request->ip();

        // ユーザーエージェントを取得
        $userAgent = $request->userAgent();

        // 上記のすべての情報をdd()で出力
        dd([
            'header' => $header,
            'hasHeader' => $hasHeader,
            'server' => $server,
            'root' => $root,
            'url' => $url,
            'fullUrl' => $fullUrl,
            'path' => $path,
            'isMatched' => $isMatched,
            'ip' => $ip,
            'userAgent' => $userAgent,
        ]);
    }
}
