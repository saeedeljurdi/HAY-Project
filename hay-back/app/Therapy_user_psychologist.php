<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapy_user_psychologist extends Model
{
    protected $table = 'therapy_user_psychologist';

    protected $fillable = [
        'name_en' , 'name_ar' , 'date' , 'image' , 'description_ar' , 'description_en' , 'psychologist_id' , 'therapy_id' , 'time_id'
    ];

    public function psychologist(){
        return $this->belongsTo(Psychologist::class);
    }

    public function time(){
        return $this->belongsToMany(Time::class ,'user_session'  ,'session_id', 'time_id');
    }

    public function usersession(){
        return $this->belongsTo(UserSession::class);
    }

    
    public function user(){
        return $this->belongsToMany(User::class ,'user_session'  ,'session_id', 'user_id'  );
    }
}

