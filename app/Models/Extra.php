<?php

// app/Models/Extra.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    protected $fillable = ['gig_id', 'package', 'title', 'description', 'price'];

    public function gig()
    {
        return $this->belongsTo(Gig::class, 'gig_id', 'gig_id');
    }
}
