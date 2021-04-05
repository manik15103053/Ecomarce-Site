<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function divisionCreate(){
        $division = Division::orderBy('priority','asc')->get();

        return view('backend.division.create',compact('division'));
    }

    public function divisionStore(Request $request){

        $this->validate($request,[


            'name'   =>   'required',
            'priority'   =>   'required',

        ]);

        $division =  new Division();
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();
        return redirect()->back()->with('msg','Division has Added Succesfully.');
    }
    public function divisionEdit($id){

        $division = Division::find($id);
        return view('backend.division.edit',compact('division'));
    }

    public function divisionUpdate(Request $request ,$id){

        $this->validate($request,[

            'name'   =>     'required',
            'priority'   =>     'required'

        ]);

        $division  = Division::find($id);
        $division->name   = $request->name;
        $division->priority   = $request->priority;
        $division->save();

        return redirect(route('division.create',))->with('msg','Division Has Updated Successfully.');
    }

    public function divisionDelete($id){

        $division = Division::find($id);

        if(!is_null($division)){

            $district = District::where('division_id','division->id')->get();

            foreach($district as $district){

                $district->delete();
            }

            $division->delete();
            return redirect()->back()->with('msg','Devision Has Deleted Successfully.');
            
        }else{

            return redirect(route('division.create'))->wth('error','No Added the Division in the database');
        }

    }
}
