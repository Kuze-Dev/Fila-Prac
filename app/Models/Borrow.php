<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrow extends Model
{
    //
    protected $fillable=[
        'user_id',
        'book_id',
        'borrow_date',
        'return_date'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
