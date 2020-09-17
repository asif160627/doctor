<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\doctorProfile;
use App\department;
use App\post;
use App\appointment;
use Illuminate\Support\Facades\Auth;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=department::select('id','name','image')->limit(5)->get();
        $blog=post::limit(5)->get();
        $doctors=doctorProfile::select('id','user_id','dept_id','specialities','image','facebook','twitter','instagram','linkedln','personal_website','verified','chat','audio','video')->where('verified',1)->get();
        return view('frontend.welcome',compact('doctors','department','blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function dashboard()
    {
      
         
        return view('doctor.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function video()
    {
        return view('doctor.video');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
