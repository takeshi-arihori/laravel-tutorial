<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CtrlController extends Controller
{
    public function plain()
    {
        return response('こんにちは、世界！', 200)
            ->header('Content-Type', 'text/plain');
    }
    public function header()
    {
        return response()
            ->view('ctrl.header', ['msg' => 'こんにちは、世界！'], 200)
            ->withHeaders([
                'Content-Type' => 'text/xml',
                'X-Powered-FW' => 'Laravel/10',
            ]);
    }

    public function outJson()
    {
        // return response()
        //     ->json([
        //         'name' => 'Takeshi Arihori',
        //         'sex' => 'male',
        //         'age' => 37,
        //     ])
        //     ->withCallback('callback');

        // 連想配列でもJsonにして返される
        return [
            'name' => 'Yoshihiro, YAMADA',
            'sex' => 'male',
            'age' => 18,
        ];
    }

    // responseメソッド経由でdownloadメソッドを呼び出す
    public function outFile()
    {
        return response()
            ->download(
                '/Users/takeshi-arihori/Documents/learning/laravel/example-test/data_log.csv', // この部分を修正
                'download.csv',
                ['Content-Type' => 'text/csv']
            );
    }

    // 生成したデータのダウンロード
    public function outCsv()
    {
        return response()
            ->streamDownload(function () {
                print("1,2019/10/01,123\n" .
                    "2,2019/10/02,456\n" .
                    "3,2019/10/03,789\n" .
                    "4,2019/10/04,012\n" .
                    "5,2019/10/05,345\n"
                );
            }, 'download.csv', ['Content-Type' => 'text/csv']);
    }

    // fileメソッドを利用することで指定されたファイルをそのままブラウザーに描画
    public function outImage()
    {
        return response()
            ->file('/Users/takeshi-arihori/Documents/learning/laravel/example-test/public/storage/pexels-tyler-nix-2396220.jpg');
    }

    public function redirectBasic()
    {
        // 通常のリダイレクト
        // return redirect('/hello/list');

        // 名前付きルートを利用したリダイレクト
        // return redirect()->route('list');

        // ルートパラメーターを利用したリダイレクト
        // return redirect()->route('param', ['id' => 5]);

        // アクションメソッドを利用したリダイレクト
        return redirect()->action('RouteController@param', ['id' => 5]);
    }

    public function index(Request $req)
    {
        return 'リクエストパス : ' . $req->path();
    }

    // 入力フォーム
    public function form()
    {
        return view('ctrl.form', ['result' => '']);
    }

    // 入力フォームから送信された値を取得する
    public function result(Request $req)
    {
        $name = $req->input('name', '名無しさん');
        $dt = Carbon::now('Asia/Tokyo')->format('Y-m-d H:i:s');
        return view('ctrl.form', [
            'result' => 'こんにちは、' . $name . 'さん！ 現在の時刻 : ' . $dt,
        ]);
    }

    // ファイルのアップロード
    public function upload()
    {
        return view('ctrl.upload', ['result' => '']);
    }

    // ファイルのアップロード結果
    public function uploadfile(Request $req)
    {
        // ファイルの存在チェック
        if (!$req->hasFile('upfile')) {
            return 'ファイルを指定して下さい。';
        }

        // ファイルを取得
        $file = $req->upfile;

        // ファイルが正しくアップロードされたかチェック
        if (!$file->isValid()) {
            return 'アップロードに失敗しました。';
        }

        // オリジナルファイルの名前を取得
        $name = $file->getClientOriginalName();

        // アップロードファイルを保存
        $file->storeAs('files', $name);
        return view('ctrl.upload', [
            'result' => $name . 'をアップロードしました。'
        ]);
    }


    // ミドルウェア
    public function middle()
    {
        return 'log is recorded!!';
    }
}
