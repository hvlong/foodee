<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function foods() {
        $this->hasMany('App\Models\Food');
    }
}
