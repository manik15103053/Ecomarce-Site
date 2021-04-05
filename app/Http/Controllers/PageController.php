<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function search(Request $request){

        $search = $request->search;

        $product = Product::orWhere('title','like','%'.$search.'%')
                          ->orWhere('description','like','%'.$search.'%')
                          ->orWhere('slug','like','%'.$search.'%')
                          ->orWhere('price','like','%'.$search.'%')
                          ->orWhere('quantity','like','%'.$search.'%')
                          ->orderBy('id','desc')
                          ->get();

 return view('frontend.layouts.product.search',compact('product','search'));                         
    }

    public function categoryshow($id)
    {

        $category   =  Category::find($id);
        if(!is_null($category)){
            return view('frontend.category.index',compact('category'));
        }else{

            return redirect(route('/'))->with('error','Sorry Theres is No Category By this ID');
        }
    }

}
