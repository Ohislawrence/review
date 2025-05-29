<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_desc',
        'long_desc',
        'summary',
        'price',
        'deal_price',
        'status',
        'video',
        'affiliate_url',
        'code',
        'api_secret',
        'api_user',
        'deal_ends',
        'plan_id',
        'rating', 'rating_count',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function faq()
    {
        return $this->hasMany(Faq::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function firstImage()
    {
        return $this->hasOne(Image::class)->oldest(); 
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'deal_categories');
    }

    public function integrations()
    {
        return $this->belongsToMany(Integration::class, 'deal_integrations');
    }

    public function updateRating($newRating)
    {
        $this->rating_count++;
        $this->rating = (($this->rating * ($this->rating_count - 1)) + $newRating) / $this->rating_count;
        $this->save();
    }
}
