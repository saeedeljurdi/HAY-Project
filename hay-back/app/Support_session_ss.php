<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support_session_ss extends Model
{
    protected $table = "support_session_ss";

    protected $fillable = [
        'name_en' , 'name_ar' , 'date' , 'image' , 'description_en' , 'description_ar' , 'support_group_id' , 'psychologist_id' , 'time_ss_id'  , 'user_id' , 'support_session_id'
    ];

    public function support_group(){
        return $this->belongsTo(Support_Group::class , 'id');
    }

    public function psychologist(){
        return $this->belongsTo(Psychologist::class);
    }

    public function time_ss(){
        return $this->belongsTo(Time_ss::class , 'id');
    }

    public function user(){
        return $this->belongsToMany(User::class , 'supportsessionss__user' , 'support_session_id');
    }
}
