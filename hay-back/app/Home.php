<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';
    protected $fillable = [
         'missions_title_ar','missions_ar','missions_title_en' , 'missions_en' , 'visions_title_ar' , 'visions_ar' , 'visions_title_en' , 'visions_en'
    ];
}
