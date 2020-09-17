<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;
use App\ChatMessage;
use App\ChatUser;
use App\Events\SendMessage;
class MessageController extends Controller
{
    
    public function index()
    {
        $authUser=Auth::user();
       $user=ChatUser::with('user','user2')->where('auth_id',Auth::id())->orWhere('second_user_id',Auth::id())->get();
       foreach ($user as $value) {
        
           $value->lastmsg=ChatMessage::where('conversation_id',$value->id)->orderBy('id','desc')->first();
       }
       


       return response()->json(['user'=>$user,'authUser'=>$authUser],200);
    }

    
    public function ChatById($id)
    {
        $name='';
        $ids='';
         $user=ChatUser::where('id',$id)->first();
         if($user->auth_id==Auth::id()){
            $name= $user->user->name;
            $ids=$user->user->name;
         }else{
             $name= $user->user2->name;
             $ids=$user->user2->name;
         }
        $message=ChatMessage::with('user')->where('conversation_id',$id)->get();
        $user=ChatUser::where('id',$id)->first();
       return response()->json(['messages'=>$message,'name'=>$name,'ids'=>$ids],200);
        
    }
    public function send(Request $request)
    {
      $msg= ChatMessage::create([
            'sender'=>Auth::id(),
            'message'=>$request->message,
            'conversation_id'=>$request->conversationId,
        ]);
      broadcast(new SendMessage($msg->message))->toOthers();
        return response()->json($msg,200);
    }
   

}
