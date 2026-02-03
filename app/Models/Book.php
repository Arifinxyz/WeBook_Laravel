mPLP lm..mmmolllyf<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
on 
class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres', 'book_id', 'genre_id');
    }

    public function dataFavorits()
    {
        return $this->hasMany(DataFavorit::class, 'book_id');
    }

    public function dataHistorys()
    {
        return $this->hasMany(DataHistory::class, 'book_id');
    }
}
