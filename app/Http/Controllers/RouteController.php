<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouteController extends Controller
{
    // 指定されたidパラメーターを受け取る
    // public function param(int $id): string
    // {
    //     return 'id 値 : ' . $id;
    // }

    // 任意のidパラメーターを受け取る
    public function param(int $id = 1): string
    {
        return 'id 値 : ' . $id;
    }

    public function enum_param(Category $category)
    {
        return $category->value;
    }
}


enum Category: string
{
    case Language = 'lang';
    case Framework = 'fw';
    case Tols = 'tools';
}
