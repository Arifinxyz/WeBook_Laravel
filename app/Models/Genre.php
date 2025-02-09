<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    protected $guarded = [];

 
    public function roles()
    {
        return $this->belongsToMany(Book::class, 'book_genres');
    }
}
 