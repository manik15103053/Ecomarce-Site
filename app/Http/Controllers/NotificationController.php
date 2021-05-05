<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notify($token){
        
       $user = User::where('remember_token',$token)->first();
       if(!is_null($user)){
        $user->status = 1;
        $user->remember_token = NULL;
        $user->save();
        return redirect(route('home'))->with('msg','You are registered successfully !! Login Now');

       }else{
           return redirect()->back()->with('msg','Sorry Your token is not Match!!');
       }

        
    }
}
