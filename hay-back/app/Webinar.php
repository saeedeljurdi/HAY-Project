<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'description_en', 'description_ar', 'image', 'date', 'time',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_events');
    }
}
