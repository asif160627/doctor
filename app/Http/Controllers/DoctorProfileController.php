<?php

namespace App\Http\Controllers;

use App\doctorProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\department;
use App\profile;
class DoctorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$id2)
    {
         $name=$id2;
        $doctor=doctorProfile::where('id',$id)->where('verified',1)->first();
       $profile=profile::where('user_id',$id)->get();
        return view('frontend.doctor-profile',compact('doctor','profile'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile_setting()
    {
        $department=department::all();
        $doctor=doctorProfile::where('user_id',Auth::user()->id)->first();


        return view('doctor.profile-setting',compact('doctor','department'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_setting_add(Request $request)
    {
        $doctorProfile = doctorProfile::updateOrCreate(
                ['user_id'=>Auth::user()->id],
                [

                    'dept_id'=>$request->dept_id,
                    'gender'=>$request->gender,
                    'dob'=>$request->gender,
                    'blood'=>$request->blood,
                    'mobile'=>$request->mobile,
                    'language'=>$request->language,
                    'specialities'=>$request->specialities,
                    'medical_reg_no'=>$request->medical_reg_no,
                    'bio'=>$request->bio,
                    'clinical_experience_year'=>$request->clinical_experience_year,
                    'clinic_name'=>$request->clinic_name,
                    'clinic_address'=>$request->clinic_address,
                    'address1'=>$request->address1,
                    'address2'=>$request->address2,
                    'country'=>$request->country,
                    'state'=>$request->state,
                    'city'=>$request->city,
                    'zip'=>$request->zip,
                    'chat'=>$request->chat,
                    'audio'=>$request->audio,
                    'video'=>$request->video,
                    'service'=>$request->services,
                    'specialization'=>$request->specialist,
                    'degree'=>$request->degree,
                    'college'=>$request->college,
                    'year'=>$request->year,
                    'exp_hospital_name'=>$request->hospital,
                    'exp_year_from'=>$request->exp_from,
                    'exp_year_to'=>$request->exp_to,
                    'hospital_designation'=>$request->designation,
                    'award'=>$request->award,
                    'award_year'=>$request->award_year,
                    'avg_patient_week'=>$request->avg_patient_week,
                ]
            );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\doctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function show(doctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\doctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(doctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\doctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, doctorProfile $doctorProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\doctorProfile  $doctorProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(doctorProfile $doctorProfile)
    {
        //
    }
}
