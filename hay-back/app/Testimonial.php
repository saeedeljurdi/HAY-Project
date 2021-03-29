<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'title_ar', 'title_en', 'description_en', 'description_ar', 'type_en', 'type_ar', 'image', 'date'
        
    ];
}
