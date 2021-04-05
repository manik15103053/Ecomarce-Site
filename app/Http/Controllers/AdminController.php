<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{
    public function index(){

        return view('admin.pages.index');
    }

    public function create(){

        $products = Product::orderBy('id','desc')->get();

        return view('backend.product.create',compact('products'));
    }

    public function store(Request $request){
       $this->validate($request,[
         'title'    =>   'required',
         'quantity'    =>   'required',
         'brand_id'   =>   'required|numeric',
         'category_id'   =>   'required|numeric',
         'price'    =>   'required'
         
       ]);

       $product  = new Product();
       $product->title  = $request->title;
       $product->quantity  = $request->quantity;
       $product->price  = $request->price;
       $product->slug  = Str::limit($request->title);
       $product->description = $request->description;
       $product->category_id =  $request->category_id;
       $product->brand_id =   $request->brand_id;
       $product->admin_id =  1;

       $product->save();

        // if($request->hasFile('product_image')){
        //     ///insert image
        //     $image = $request->file('product_image');
        //     $img = time().'.'.$image->getClientOriginalExtension();
        //     $location = public_path('images/product/' .$img);
        //     Image::make($image)->save($location);

        //     $product_image = new ProductImage();
        //     $product_image->product_id = $product->id;
        //     $product_image->image = $img;
        //     $product_image->save();


        // }

        if(count($request->product_image) > 0){
            foreach($request->product_image as $image){
              $img = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/product/' .$img);
            Image::make($image)->save($location);

            $product_image = new ProductImage();
            $product_image->product_id = $product->id;
            $product_image->image = $img;
            $product_image->save(); 
            }
        }

       return redirect(route('admin.create.product'))->with('msg','Product Successfully Added');

    }
    public function edit($id){

      $product = Product::find($id);
      
      return view('backend.product.edit',compact('product'));
    }

    public function update(Request $request,$id){

      $this->validate($request,[
        'title'    =>   'required',
        'quantity'    =>   'required',
        'brand_id'   =>   'required|numeric',
        'category_id'   =>   'required|numeric',
        'price'    =>   'required'
        
      ]);

      $product = Product::find($id);

       $product->title  = $request->title;
       $product->quantity  = $request->quantity;
       $product->price  = $request->price;
       $product->slug  = Str::limit($request->title);
       $product->description = $request->description;
       $product->category_id =  $request->category_id;
       $product->brand_id =   $request->brand_id;
       $product->admin_id =  1;

       $product->save();

       return redirect(route('admin.create.product'))->with('msg','Product Update Successfully.');
    }

    public function delete($id){
 
      $product = Product::find($id)->delete();
      return redirect()->back()->with('msg','Product Delete Successfully');

    }
}
