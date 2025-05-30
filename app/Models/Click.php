<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    protected $fillable = [
        'deal_id',
        'ip_address',
        'user_agent',
        'referrer',
        'country',
        'clicked_at',
    ];
}
