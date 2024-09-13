<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finer extends Model
{
    use HasFactory; // Added missing trait

    protected $fillable = ['name', 'minisubcategory_id'];

    public function minisubcategory()
    {
        return $this->belongsTo(Minsubcategory::class);
    }
}
