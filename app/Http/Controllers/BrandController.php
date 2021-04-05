<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function brandCreate(){

        $brands = Brand::orderBy('id','desc')->get();

        return view('backend.brand.create',compact('brands'));
    }

    public function brandStore(Request $request){

        //dd($request->all());

        $this->validate($request,[

            'name'   =>  'required',
            'image'   =>  'nullable',
            'description'   =>  'nullable'

        ]);

        $brands  = new Brand();
        $brands->name = $request->name;
        $brands->description = $request->description;

        if($request->hasFile('image')){

            $image = $request->file('image');
            $img  = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image)->save($location);
            $brands->image  = $img;
        }
        $brands->save();
        return redirect()->back()->with('msg','Brand Has Added Successfully');

    }

    public function brnadEdit($id){

        $brands = Brand::find($id);
        return view('backend.brand.edit',compact('brands'));
    }

    public function brandUpdate(Request $request, $id){

        $this->validate($request,[

            'name'   =>  'required',
            'image'   =>  'nullable',
            'description'   =>  'nullable'

        ]);

        $brands  =  Brand::find($id);
        $brands->name = $request->name;
        $brands->description = $request->description;

        if($request->hasFile('image')){

            if(File::exists('images/brands/',$brands->image)){

              File::delete('images/brands/',$brands->image);
            }

            $image = $request->file('image');
            $img  = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image)->save($location);
            $brands->image  = $img;
        }
        $brands->save();
        return redirect(route('brand.create'))->with('msg','Brand Has Updated Successfully');


    }

    public function BrandDelete($id){

        $brands = Brand::find($id);

        if(!is_null($brands)){

            if(File::exists('images/brands/'.$brands->image)){
                File::delete('images/brands/'.$brands->image);
            }
        }
        $brands->delete();
        return redirect(route('brand.create'))->with('msg','Brand Has Deleted Successfully');
    }
}
