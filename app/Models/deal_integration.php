<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class deal_integration extends Model
{
    protected $fillable = [
        'deal_id',
        'integration_id',
    ];
}
