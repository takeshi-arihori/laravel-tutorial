<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\RequestCheckController;
use App\Http\Middleware\LogMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// MVCの練習
Route::get('/hello', 'HelloController@index');
Route::get('/hello/view', 'HelloController@view');
Route::get('/hello/list', 'HelloController@list');
Route::get('/view/escape', 'ViewController@escape');
Route::get('/view/if', 'ViewController@if');
Route::get('/view/unless', 'ViewController@unless');
Route::get('/view/isset', 'ViewController@isset');
Route::get('/view/switch', 'ViewController@switch');
Route::get('view/while', 'ViewController@while');
Route::get('view/foreach_assoc', 'ViewController@foreach_assoc');
Route::get('view/foreach_loop', 'ViewController@foreach_loop');
Route::get('view/style_class', 'ViewController@style_class');
Route::get('view/checked', 'ViewController@checked');
Route::get('view/master', 'ViewController@master');
Route::get('view/comp', 'ViewController@comp');
Route::get('view/list', 'ViewController@list');

// HTTP POST経由でのリクエストを受け付ける
Route::post('route/post', 'RouteController@post');

// 複数のHTTPメソッドを指定する
Route::match(['get', 'post'], 'route/match', 'RouteController@match');

// HTTPメソッドを特定せずに全てのHTTPメソッドを指定する
Route::any('route/any', 'RouteController@any');


// idパラメーターを渡す
Route::get('route/param/{id}', 'RouteController@param');

// 任意のパラメーターを渡す
Route::get('route/param/{id?}', 'RouteController@param');

// 正規表現でパラメーターを制限する
Route::get('route/param/{id?}', 'RouteController@param')
    // ->where('id', '[0-9]{2,3}');
    // ->whereNumber('id');
    ->where('keywd', '.*');

Route::prefix('/members')->group(function () {
    Route::get('/info', 'MemberController@info');
    Route::get('/article', 'MemberController@article');
});


// controllerメソッドを利用してコントローラーを指定する
Route::controller(HelloController::class)->group(function () {
    Route::get('/hello', 'index');
    Route::get('/hello/view', 'view');
    Route::get('/hello/list', 'list');
});

// 名前空間付きのコントローラーを指定する
Route::namespace('Main')->group(function () {
    Route::get('/route/ns', 'RouteController@ns');
});

// アクションの省略で「/routeに対してroute/view.blade.phpを返す」
Route::view('/route', 'route.view', ['name' => 'Laravel']);

// Enum型の練習
Route::get('/route/enum_param/{category}', 'RouteController@enum_param');

// 特定のパスを別のルートにリダイレクトする
Route::redirect('/hoge', '/', 301);

// リソースルート
Route::resource('/articles', 'ArticleController');

// 特定のルートを無効化
Route::resource('/articles', 'ArticleController')
    ->except(['edit', 'update']);



/* =============== Part6:Controller開発 ================ */

Route::get('/ctrl/plain', 'CtrlController@plain');
Route::get('/ctrl/header', 'CtrlController@header');
Route::get('/ctrl/outJson', 'CtrlController@outJson');
Route::get('/ctrl/outFile', 'CtrlController@outFile');
Route::get('/ctrl/outCsv', 'CtrlController@outCsv');
Route::get('/ctrl/outImage', 'CtrlController@outImage');
Route::get('/ctrl/form', 'CtrlController@form');


// リダイレクト
Route::get('/ctrl/redirectBasic', 'CtrlController@redirectBasic');
// ルートメソッドを使用する場合
Route::get('/hello/list', 'HelloController@list')
    ->name('list');
// ルートのパラメーターを指定する場合
Route::get('/hello/list/{id?}', 'HelloController@list')
    ->name('param');
// アクション名を指定する場合
Route::get('/hello/list', [
    'uses' => 'HelloController@list',
    'as' => 'list',
]);


// Requestオブジェクトの詳細を確認するためのルーティング
Route::get('/check-request-details', 'RequestCheckController@checkRequestDetails');

// result Action (form.blade.php)
Route::post('/ctrl/result', 'CtrlController@result');

// ファイルのアップロード
Route::get('/ctrl/upload', 'CtrlController@upload');

// ファイルのアップロード結果
Route::post('/ctrl/uploadfile', 'CtrlController@uploadfile');


// ミドルウェアの設定
Route::get('/ctrl/middle', 'CtrlController@middle')
    ->middleware(LogMiddleware::class);

Route::group(['middleware' => ['debug']], function () {
    Route::get('/ctrl/middle', 'CtrlController@middle');
});



/* =============== Part7:state ================ */
Route::get('/state/recCookie', 'StateController@recCookie');
Route::get('/state/readCookie', 'StateController@readCookie');
Route::get('/state/session1', 'StateController@session1');
// Route::get('/state/session2', 'StateController@session2');







// フォールバックルート
Route::fallback(function () {
    return view('route.error');
});
