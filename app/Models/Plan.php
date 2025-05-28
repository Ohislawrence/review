<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function deals()
    {
        return $this->belongsTo(Deal::class,);
    }
    
}
