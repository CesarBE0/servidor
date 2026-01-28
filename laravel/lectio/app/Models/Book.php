<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'author', 'category', 'pages', 'price', 'old_price',
        'discount_percent', 'image_url', 'is_bestseller',
        'synopsis', 'publisher', 'language', 'published_date', 'rating', 'reviews_count'
    ];
}
