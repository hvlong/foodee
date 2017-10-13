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
        'category',
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
//        return URL::to('/') . '/storage/foods/' . $this->attributes['thumbnail'];
        return 'http://food.fnr.sndimg.com/content/dam/images/food/fullset/2009/5/13/0/IG0501_31046_s4x3.jpg.rend.hgtvcom.616.462.suffix/1371589314633.jpeg';
    }

}
