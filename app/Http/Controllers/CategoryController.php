<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;

class CategoryController extends Controller
{
   public function categoryCreate(){

    $categories = Category::orderBy('id','desc')->get();
    $main_category = Category::orderBy('name','desc')->where('parent_id',Null)->get();


    return view('backend.category.create',compact('categories','main_category'));
   }

   public function categoryStore(Request $request){

    $this->validate($request,[

        'name'   =>  'required',
        'image'  =>   'nullable|image'


    ]);

    $category = new Category();
    $category->name  = $request->name;
    $category->description  = $request->description;
    $category->parent_id  = $request->parent_id;
    
    if($request->hasFile('image')){

        $image = $request->file('image');
        $img = time(). '.'.$image->getClientOriginalExtension();
        $location = public_path('images/categories/'.$img);
        Image::make($image)->save($location);
        $category->image = $img;
    }
    
       

   
    $category->save();
    return redirect()->back()->with('msg','A New Category Has added Successfylly.');
   }

   public function categoryEdit($id){

    $category = Category::find($id);
    $main_category = Category::orderBy('name','desc')->where('parent_id',Null)->get();


    if(!is_null($category)){
        return view('backend.category.edit',compact('category','main_category'));
    }else{

        return redirect(route('category.create'));
    }
   }

   public function categoryUpdate(Request $request , $id){

    $this->validate($request,[

        'name'   =>   'required',
        'image'  =>   'nullable|image'


    ]);
    $category = Category::find($id);
    $category->name   =  $request->name;
    $category->description   =  $request->description;
    $category->parent_id   =  $request->parent_id;

    if($request->hasFile('image')){


        if(File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }
        $image = $request->file('image');
        $img = time(). '.' .$image->getClientOriginalExtension();
        $location = public_path('images/categories/'.$img);
        Image::make($image)->save($location);
        $category->image  = $img;
    }

    $category->save();
    return redirect(route('admin.category.create'))->with('msg','A New Category Has Updated Successfylly.');
    
   }

 
   public function categoryDelete($id){

    $category = Category::find($id);

    if(!is_null($category)){

        if($category->parent_id == NULL){

            $sub_category = Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
            foreach($sub_category as $sub){

                if(File::exists('images/categories/'.$sub->image)){
                    File::delete('images/categories/'.$sub->image);
                }
                $sub->delete();


            }

        }

        if(File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }
        $category->delete();
    }
    return redirect()->back()->with('msg','Category Has Delete Successfully.');

   }

  
}
