<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function userDashboard(){

        $user = Auth::user();
        //dd($user->all());

        return view('frontend.user.dashboard',compact('user'));
    }

    public function userProfile(){

        $user = Auth::user();
        $division = Division::orderBy('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();
        return view('frontend.user.profile',compact('user','division','district'));

    }
    public function userUpdate(Request $request){
        $user = Auth::user();

        $this->validate($request,[

            'first_name'   =>  'required',
            'last_name'   =>  'required',
            'username'   =>  'required|max:100|unique:users,username,'.$user->id,
            'email'   =>  'required|email|unique:users,email,'.$user->id,
            'phone'   =>  'required|max:11|unique:users,phone,'.$user->id,
            'division_id'   =>  'required',
            'district_id'   =>  'required',
            'street_address'   =>  'required',
            'image'   =>  'nullable'

            
        ]);
      
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->street_address = $request->street_address;
        $user->shipping_address = $request->shipping_address;
       
        

        if($request->hasFile('image')){

            $image = $request->file('image');
            $img  = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/user/'.$img);
            Image::make($image)->save($location);
            $user->image  = $img;
        }
        ///Notification

        $user->save();
        return redirect()->back()->with('msg','User Updated Has Successfully');
        

    }
}
