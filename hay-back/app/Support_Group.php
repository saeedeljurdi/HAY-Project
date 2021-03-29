<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support_Group extends Model
{
   protected $table = "support_group";

   protected $fillable = [
       'title_en' , 'title_ar' , 'description_en' , 'description_ar' , 'image' 
   ];

   public function supportSession(){
     return $this->hasMany(Support_session_ss::class , 'id');
   }
}
