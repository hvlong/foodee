<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    public function category()
    {
        $this->belongsTo('App\Models\Category');
    }

}
