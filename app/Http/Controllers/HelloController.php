<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index()
    {
        return 'Hello, World AND Laravel!!!!!';
    }

    public function view()
    {
        $data = [
            'msg' => 'こんにちわ、世界！',
        ];

        return view('hello.view', $data);
    }

    public function list()
    {
        $data = [
            'records' => Book::all()
            // 生のSQL
            // 'records' => DB::select('SELECT * FROM books')
        ];

        // dd($data);
        return view('hello.list', $data);
    }
}
