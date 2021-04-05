<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function home(){

        $product = Product::orderBy('id','desc')->get();

        return view('frontend.layouts.home',compact('product'));
    }

    public function index(){

        $product = Product::orderBy('id','desc')->get();

        return view('frontend.layouts.product.index',compact('product'));
    }

    public function showProduct($slug){

        $product = Product::where('slug',$slug)->first();
        if(!is_null($product)){
            return view('frontend.layouts.product.show',compact('product'));

        }else{

            return redirect(route('product'))->with('msg','There is no product by URL....');
        }
    }
}
