<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatUser extends Model
{
	protected $guarded=[];
      public function user()
  {
    return $this->belongsTo('App\User', 'second_user_id','id');
  }
    public function user2()
  {
    return $this->belongsTo('App\User', 'auth_id','id');
  }
}
