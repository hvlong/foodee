<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id',
        'title',
        'date_start',
        'date_end',
        'description',
    ];

    protected $appends = ['status'];

    public function getStatusAttribute()
    {
        $today = Carbon::now()->toDateString();
        if ($today < $this->attributes['date_end']) {
            return $this->attributes['status'] = 'Opening';
        }
        return $this->attributes['status'] = 'Finished';
    }

}
