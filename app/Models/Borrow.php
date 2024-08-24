<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'book_id', 'borrowed_at', 'returned_at'];
    public $timestamps = false;

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function book():BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}


