<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Psychologist extends Model
{
    protected $table = 'prsychologist';

    protected $fillable = [
        'name_en' , 'name_ar' , 'image' , 'description_en' , 'description_ar'
    ];
}
