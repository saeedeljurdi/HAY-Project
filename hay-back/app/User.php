<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
  use Notifiable;

  protected $table = 'user';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name' , 'email', 'password' ,'image', 'phone' , 'age', 'occupation' , 'education' , 'area' ,'interests'  
];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];
/**
   * The attributes that should be JWT Identifier.
   *
   * @var array
   */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    /**
   * The attributes that should be getJWTCustomClaims.
   *
   * @var array
   */
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    /**
   * The attributes that should be setPasswordAttribute.
   *
   * @var $password
   */
    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }    

    /**
     * 
     */

    function support_session(){
        return $this->belongsToMany(User::class , 'supportsessionss__user'  , 'user_id');
    }

    
  }