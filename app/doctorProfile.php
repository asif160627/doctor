<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctorProfile extends Model
{
	protected $guarded = [];


    public function user(){
    	 return $this->belongsTo(\App\User::class,'user_id','id');
    }
    public function department(){
    	 return $this->belongsTo(\App\Department::class,'dept_id','id');
    }
   
    public function profile(){
        return $this->hasMany(profile::class,'user_id','user_id');
    }
    
}
