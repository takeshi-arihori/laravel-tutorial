<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // use HasFactory;

    protected $promaryKey = 'isbn'; // 列名
    protected $keyType = 'string'; // データ型
    public $incrementing = false; // 自動連番??
}
