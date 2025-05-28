<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id',
        'review',
        'deal_id',
    ];

    public function deals()
    {
        return $this->belongsTo(Deal::class,);
    }
}
