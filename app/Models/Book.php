<?php

namespace App\Models;

use App\Models\Author;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    //
    protected $fillable = [
       'title',
       'author_id',
       'category_id',
       'published_year',
       'isbn',
       'available_copies',
       'book_image',
    ];

    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class);
    }

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function borrow():HasOne
    {
        return $this->hasOne(Borrow::class);
    }
}
