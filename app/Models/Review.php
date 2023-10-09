<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    // booksテーブルへの参照 (多 対 1: belongsTo)
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
