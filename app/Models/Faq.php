<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'deal_id',
    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class,);
    }
}
