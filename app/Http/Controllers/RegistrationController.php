<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function registrationCreate(){

        $division = Division::orderBy('priority','asc')->get();
        $district = District::orderBy('name','asc')->get();
        return view('frontend.registration.create',compact('division','district'));
    }
    public function registrationStore(Request $request){

        dd($request->all());

        $this->validate($request,[

            'first_name'   =>  'required',
            'last_name'   =>  'required',
            'username'   =>  'required',
            'email'   =>  'required',
            'phone'   =>  'required',
            'division_id'   =>  'required',
            'district_id'   =>  'required',
            'street_address'   =>  'required',
            'password'   =>  'required'
        ]);
    }
}
