<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'time';

    protected $fillable = [
        'time'
    ];

    public function session(){
        return $this->belongsTo(Therapy_user_psychologist::class );
    }
}
