<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        $date = date_create($value);
        return date_format($date, 'Y-m-d');
    }

    public function getDateStartAttribute($value)
    {
        $date = date_create($value);
        return date_format($date, 'Y-m-d');
    }
}
