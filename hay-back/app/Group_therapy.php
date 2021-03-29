<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group_therapy extends Model
{
    protected $table = 'group_therapy';

    protected $fillable = [
        'title_en' , 'title_ar' , 'description_en' , 'description_ar' , 'image'
    ];
    public function session(){
        return $this->belongsTo(Therapy_user_psychologist::class ,'id' , 'therapy_id');
    }
}

