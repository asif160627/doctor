<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('verify', 'AppController@verify');

Route::get('/', 'IndexController@index')->name('frontend');
Route::get('/doctor/{id}/{id2}', 'DoctorProfileController@index')->name('singleDoctor');
Route::get('/consult-doctor', 'FrontController@consultDoctor')->name('consultDoctor');
Route::get('/doctor/{id}/{id2}/booking', 'AppointmentController@bookDoctor')->name('bookDoctor');
Route::post('/doctor/booking', 'AppointmentController@bookingDetails')->name('bookingDetails');
Route::post('/dynamic-data', 'AppointmentController@dynamic')->name('dynamic');
Route::get('/doctors', 'DoctorsController@doctors')->name('doctors');


Route::get('/blog/post/{id}/{id2}', 'PostController@singlePost')->name('singlePost');
Route::get('/blog/posts', 'PostController@allPost')->name('allPost');


Route::get('/doctor/chat-patient', 'ChatController@index')->name('doctor.chat');
Route::get('/messages/{ids}', 'ChatController@chat')->name('messages.chat');


Route::get('/doctor/onlineusers', 'ChatController@onlineusers')->name('doctor.onlineusers');

Route::get('/doctor/profile-setting', 'DoctorProfileController@profile_setting')->name('doctor.profile-setting');
Route::post('/doctor/profile-setting', 'DoctorProfileController@profile_setting_add')->name('doctor.profile-setting-add');
Route::get('/doctor-home', 'IndexController@dashboard')->name('doctor.dashboard');
Route::get('/patient/dashboard', 'IndexController@dashboard')->name('patient.dashboard');
Route::get('/patient/profile-setting', 'DoctorProfileController@profile_setting')->name('patient.profile-setting');


Route::get('/doctor-home/{any}', function () {
    return view('doctor.dashboard');
});



Route::get('/patientStatus/{id}', 'AppointmentController@status')->name('status');

Route::get('/doctor/payment/{id}/{id2}', 'PaymentController@index')->name('checkout');

//Route::get('/home', 'HomeController@index')->name('home');


Route::get('/doctor/message', 'ChatController@index')->name('doctor.chat');

Route::post('/token', 'TicketController@generate');





//Doctor Panel
Route::resource('/dp/appointments', 'API\AppointmentController');
Route::get('/dp/patients', 'API\AppointmentController@patients');
Route::resource('/dp/scheduling', 'API\SchedulingController');
Route::get('/dp/message', 'API\MessageController@index');
Route::get('/dp/message/{id}', 'API\MessageController@ChatById');
Route::post('/dp/message/send', 'API\MessageController@send');
Route::post('/dp/message/send/file', 'API\MessageController@sendFilesInConversation')->name('chat.send.file');


Route::get('dp/video_chat', 'API\VideoController@index');
Route::get('dp/video_chat/{id}', 'API\VideoController@show');
  Route::post('dp/video_chat', 'API\VideoController@store');