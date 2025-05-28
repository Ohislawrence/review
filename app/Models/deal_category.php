<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class deal_category extends Model
{
    protected $fillable = [
        'deal_id',
        'category_id',
    ];
}
