<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable=['name','author_id','category','year','copy'];
    protected $hidden=[];
    protected $casts=[];
    public $timestamps = false;
    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }
    public function borrows():HasMany
    {
        return $this->hasMany(Borrow::class);
    }
}
