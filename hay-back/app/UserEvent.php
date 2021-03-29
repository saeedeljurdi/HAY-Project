<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserEvent extends Model
{
    protected $fillable = [
        'user_id', 'webinar_id'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function webinar()
    {
        return $this->belongsToMany(Webinar::class);
    }
}
