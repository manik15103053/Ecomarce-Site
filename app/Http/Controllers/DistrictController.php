<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function districtCreate(){

        $district = District::orderBy('name','asc')->get();
        $division = Division::orderBy('priority','asc')->get();
        
        return view('backend.district.create',compact('district','division'));


    }
    public function districtStore(Request $request){

        $this->validate($request,[

            'name'   =>  'required',
            'division_id' =>  'required'

        ]);

        $district = new District();

        $district->name  = $request->name;
        $district->division_id  = $request->division_id;
        $district->save();

        return redirect(route('district.create'))->with('msg','District Has Added Successfully.');
    }

    public function districtEdit($id){

        $district = District::find($id);
        $division = Division::orderBy('priority','asc')->get();

        return view('backend.district.edit',compact('district','division'));


    }

    public function districtUpdate(Request $request ,$id){

        $this->validate($request,[

            'name'    =>   'required',
            'division_id' =>  'required'

        ]);

        $district  = District::find($id);
        $district->name   =  $request->name;
        $district->division_id = $request->division_id;
        $district->save();
        return redirect(route('district.create'))->with('msg','District Has Updated Successfully.');
    }
    public function districtDelete($id){

        $district  = District::find($id);
        if(!is_null($district)){
            $district->delete();
        }
        return redirect(route('district.create'))->with('msg','District Has Deleted Successfully.');
    }
}
