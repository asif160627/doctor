<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
   //restricts columns from modifying
  protected $guarded = [];

  // posts has many comments
  // returns all comments on that post
  public function comments()
  {
    return $this->hasMany('App\Comment', 'on_post');
  }
  
  // returns the instance of the user who is author of that post


   public function user(){
       return $this->belongsTo(User::class,'author_id','id');
    }
    public function category(){
       return $this->belongsTo(Category::class,'cat_id','id');
    }
}
