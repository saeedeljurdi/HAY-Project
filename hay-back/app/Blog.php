<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['name','title_ar','title_en','description_ar','description_en','image'];
}
