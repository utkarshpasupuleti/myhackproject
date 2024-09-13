<?php
// app/Models/Gig.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    protected $primaryKey = 'gig_id';
    protected $fillable = [
        'user_id','gig_id', 'title', 'gigdesc', 'category', 'subcategories',
        'minisubcategories', 'searchTags', 'declaration',
        'gig_description_summary', 'additional_details', 'video',
        'images', 'documents'
    ];

    public function packages()
    {
        return $this->hasMany(Package::class, 'gig_id', 'gig_id');
    }

    public function extras()
    {
        return $this->hasMany(Extra::class, 'gig_id', 'gig_id');
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'gig_id', 'gig_id');
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class, 'gig_id', 'gig_id');
    }
}
