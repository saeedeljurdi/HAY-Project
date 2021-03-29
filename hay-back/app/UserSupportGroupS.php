<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSupportGroupS extends Model
{
    protected $table = "supportsessionss__user";

    protected $fillable = [
        'user_id' , 'support_session_id' , 'time_ss_id'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'supportsessionss__user','id');
    }

    public function session(){
        return $this->belongsToMany(Support_session_ss::class,'supportsessionss__user' , 'id', 'support_session_id');
    }
    public function time(){
        return $this->belongsTo(Time_ss::class,'time_ss_id');
    }
}
