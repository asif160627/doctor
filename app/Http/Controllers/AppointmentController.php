<?php

namespace App\Http\Controllers;

use App\appointment;
use Illuminate\Http\Request;
use App\doctorProfile;
use App\doctorScheduling;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookDoctor($id,$id2)
    {
        $doctor=doctorProfile::where('id',$id)->where('verified',1)->first();
        $doctime=doctorScheduling::where('doctor_id',$id)->distinct()->get();
        return view('frontend.booking',compact('doctor','doctime'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dynamic(Request $request){
        $select=$request->get('select');
        $value=$request->get('value');
        $dependent=$request->get('dependent'); 
        $time=doctorScheduling::where('doctor_id',6)->where($select,$value)->get();
        foreach ($time as $value) {
            $data[]=explode(",",$value->time);
        
        }
         $result = array_reduce($data, 'array_merge', array());
       return $result;
       
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {
        $data=appointment::where('order_id','CARE'.$id)->first();
       return view('frontend.booking-confirm',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        return appointment::where('id',$id)->update(['verified'=>1]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
     public function bookingDetails(Request $request)
    {
       
       
        $doctor=doctorProfile::where('id',$request->doctor_id)->first();
        $price=0;
        if($request->media=='msg')
            $price=$doctor->chat;
        elseif($request->media=='Audio')
            $price=$doctor->audio;
        elseif($request->media=='Video')
            $price=$doctor->audio;

       
        $scheduling=new appointment();
        $scheduling->patient_id=1;
        $scheduling->doctor_id=$request->doctor_id;
        $scheduling->query=$request['query'];
        $scheduling->date=$request->date;
        $scheduling->time=$request->time;
        $scheduling->media=$request->media;
        $scheduling->doctor_ammount=$price;
        $scheduling->service_ammount=20.0;
        $scheduling->total_ammount=$price+$scheduling->service_ammount;
        $order_id='CARE'.rand(100000, 999999);
        $scheduling->order_id=$order_id;

          if($request->hasFile('image')){
       $files = $request->file('image');
       foreach ($files as $value) {
           $filename = $value->getClientOriginalName();
           $value->move('assets/img/patient/', $filename);
           $data[]=$filename;
       }
       
       $scheduling->file=implode(",",$data);
       

    }
    $scheduling->save();
       $data=appointment::where('order_id',$order_id)->first();
       return view('frontend.checkout',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(appointment $appointment)
    {
        //
    }
}
