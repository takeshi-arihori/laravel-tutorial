<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

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
        ];

        return view('hello.list', $data);
    }
}
