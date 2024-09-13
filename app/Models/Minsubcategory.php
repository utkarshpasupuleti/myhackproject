<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minsubcategory extends Model
{
    use HasFactory; // Added missing trait

    protected $fillable = ['name', 'subcategory_id'];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function finers() // Correct method name for relationship
    {
        return $this->hasMany(Finer::class);
    }
}
