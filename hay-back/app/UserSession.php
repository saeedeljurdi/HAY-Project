<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSession extends Model
{
    protected $table = 'user_session';

    protected $fillable = [
        'user_id' , 'session_id' , 'time_id'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'user_session','id');
    }

    public function session(){
        return $this->belongsToMany(Therapy_user_psychologist::class,'user_session' , 'id', 'session_id');
    }
    public function time(){
        return $this->belongsTo(Time::class,'time_id');
    }
}
