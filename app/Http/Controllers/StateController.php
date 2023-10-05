<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StateController extends Controller
{
    // - クッキー：ブラウザーに保存する小さなテキスト情報
    // - セッション：ファイル、データベースなどに情報を保存するしくみ
    // - フラッシュ：現在と次のリクエストでのみ保持される、特別なセッション
    public function recCookie()
    {
        // cookieメソッドの引数は先頭から、名前 値 有効期限（分） パス ドメイン HTTPSでのみ送信するか（true／false）
        return response()
            ->view('state.view')
            ->cookie('app_title', 'laravel', 60 * 24 * 30);
        // Cookieを明示的に削除する場合は、withoutCookieメソッドを使用する
        // ->withoutCookie('app_title');
    }

    // 保存したクッキーを取得する
    public function readCookie(Request $req)
    {
        return view('state.readcookie', [
            'app_title' => $req->cookie('app_title')
        ]);
    }
}
