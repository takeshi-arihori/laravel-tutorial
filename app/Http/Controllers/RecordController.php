<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RecordController extends Controller
{
    public function find()
    {
        // dd(Book::find(1));
        return Book::find(1)->title;
    }

    public function where()
    {
        // $result = Book::where('publisher', '走跳社')->get();
        // return view('hello.list', ['records' => $result]);

        // $result = Book::where('publisher', '走跳社')->first();

        // 大小検索
        // $result = Book::where('price', '<', 3000)->get();

        // 部分一致検索
        // $result = Book::where('title', 'LIKE', '%est%')->get();

        // 範囲検索(whereIn)
        // $result = Book::whereIn('publisher', ['ジャパンIT', '走跳社', 'IT Emotion'])->get();

        // 範囲検索(whereBetween)
        // $result = Book::whereBetween('price', [1000, 3000])->get();

        // NULLチェック
        // $result = Book::whereNull('publisher')->get();

        // 日付検索
        // $result = Book::whereYear('published', '2021')->get();

        // AND / OR条件
        // whereメソッドを複数呼び出した場合、条件式はAND演算子で接続されます。
        // たとえば以下は「出版社が走跳社で、かつ、価格が3000円未満の書籍」
        // $result = Book::where('publisher', '走跳社')->where('price', '<', 3000)->get();

        // 「出版社が走跳社、または、価格が2500円未満の書籍」を検索
        // $result = Book::where('publisher', '走跳社')->orWhere('price', '<', 2500)->get();


        // 生の条件式
        // $result = Book::whereRaw('publisher = ? AND price < ?', ['走跳社', 3000])->get();

        // データの並び替え
        // $result = Book::orderBy('price', 'desc')->orderBy('published', 'asc')->get();


        // 取得範囲の指定(offset-> 2, limit-> 3) 2番目から3件取得
        // $result = Book::orderBy('published', 'desc')
        //     ->offset(2)->limit(3)->get();

        // 取得列の制約
        // $result = Book::select('title', 'publisher')->get();

        // データのグループ化
        // $result = Book::groupBy('publisher')
        //     ->selectRaw('publisher, AVG(price) AS price_avg')->get();
        // return $result;

        // グループ化列の絞り込み
        // $result = Book::groupBy('publisher')
        //     ->having('price_avg', '>', 2500)
        //     ->selectRaw('publisher, AVG(price) AS price_avg')->get();
        // return $result;

        // データの集計
        // $result = Book::where('publisher', '走跳社')->max('price');
        // return $result;


        // publishedスコープで絞り込み
        // $result = Book::published()->get();
        // return $result;

        $result = Book::groupBy('publisher')
            ->having('price_avg', '<', 2500)
            ->selectRaw('publisher, AVG(price) AS price_avg')->dump()->get();

        return view('record.where', ['records' => $result]);
    }

    // リレーションの利用(id=1の書籍情報に紐づいたレビューを取得する例)
    public function hasmany()
    {
        // dd(Book::find(1)->reviews);
        return view('record.hasmany', [
            'book' => Book::find(1),
        ]);
    }
}
