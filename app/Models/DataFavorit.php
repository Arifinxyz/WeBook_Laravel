<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataFavorit extends Model
{
    protected $table = 'data_favorits';
    protected $fillable = ['user_id', 'book_id'];
}
