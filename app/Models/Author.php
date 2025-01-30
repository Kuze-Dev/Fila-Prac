<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Author extends Model
{
    protected $fillable = [
        'name',
        'bio',
    ];


    public function books(): HasOne
    {
        return $this->hasOne(Book::class);
    }


}


