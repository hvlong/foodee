<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Food extends Model
{

    protected $fillable = [
        'id',
        'name',
        'price',
        'thumbnail',
        'description',
        'is_feature',
        'category_id',
        'created_at',
        'updated_at',
    ];

    protected $appends = ['thumbnail'];

    public function category()
    {
        $this->belongsTo('App\Models\Category');
    }

    public function getThumbnailAttribute()
    {
        return URL::to('/') . '/storage/foods/' . $this->attributes['thumbnail'];
    }
}
