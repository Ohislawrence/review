<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'deal_id',
        'image',
        'desc',
    ];

    public function deals()
    {
        return $this->belongsTo(Deal::class);
    }
}
