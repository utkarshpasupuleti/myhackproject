<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'gig_id',
        'name',
        'short_description',
        'price',
        'delivery_time',
        'features',
        'revisions',
        'status',
        'visibility',
    ];

    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }
}
