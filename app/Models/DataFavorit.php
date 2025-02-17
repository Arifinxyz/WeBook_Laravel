<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class DataFavorit extends Model
{
    protected $table = 'data_favorits';
    protected $fillable = ['user_id', 'book_id'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
