<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use App\Models\Division;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Notifications\VerifyRegistration;

class RegistrationController extends Controller
{
    public function registrationCreate(){

        $division = Division::orderBy('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();
        return view('frontend.registration.create',compact('division','district'));
    }
    public function registrationStore(Request $request){

        //dd($request->all());

        $this->validate($request,[

            'first_name'   =>  'required',
            'last_name'   =>  'required',
            'username'   =>  'required|unique:users|min:5',
            'email'   =>  'required|email|unique:users',
            'phone'   =>  'required|unique:users|min:11',
            'division_id'   =>  'required',
            'district_id'   =>  'required',
            'street_address'   =>  'required',
            'password'   =>  'required',
            'image'   =>  'nullable'

            
        ]);

        $user =  new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->street_address = $request->street_address;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(50);
        $user->status = 0;

        if($request->hasFile('image')){

            $image = $request->file('image');
            $img  = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/user/'.$img);
            Image::make($image)->save($location);
            $user->image  = $img;
        }
        ///Notification

        $user->save();
        return redirect()->back()->with('msg','Registration Has Successfully');
        
        
    }

    ///Login Process
    public function loginCreate(){

        return view('frontend.registration.login');
    }

    public function login(Request $request){

        $login = $request->only('email', 'password');

        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect(route('home'));
    }else{

        return redirect()->back()->with('msg','Your Cretential is Invalied');
    }
}

/////Logout Process

public function logout(){

    Auth::logout();
    return redirect(route('home'));
}
}