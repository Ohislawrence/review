<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OS extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
}
