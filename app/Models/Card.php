<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['title','gig_id','rating', 'description', 'rating', 'price', 'images', 'videos'];
    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
    ];
}
