<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo('App\User','patient_id','id');
    }
    public function doctor()
    {
        return $this->belongsTo('App\DoctorProfile','doctor_id','id');
    }
}
