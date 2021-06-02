<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartIndex()
    {
        return view('frontend.layouts.cart');
    }
    public function cartStore(Request $request){
        $this->validate($request,[

            'product_id'  =>  'required'
        ],
        
        [
            'product_id.ruquired'  => 'Please Give a Product'
        ]);

        if(Auth::check()){
            $cart = Cart::Where('user_id',Auth::id())
                ->where('product_id',$request->product_id)
                ->first();
        }else{

            $cart = Cart::Where('ip_address',request()->ip())
                ->where('product_id',$request->product_id)
                ->first();
        }
            

                if(!is_null($cart)){
                    $cart->increment('product_quantity');

                }else{

                    $cart = new Cart();
                    if(Auth::check()){
                    $cart->user_id   = Auth::id();
                    }
                    $cart->ip_address = request()->ip();
                    $cart->product_id  = $request->product_id;
                    $cart->save();
                    
                }
       
        return redirect()->back()->with('msg','Product Has Added to Cart!!');
        
    }

    public function cartUpdate(Request $request ,$id){

        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->product_quantity = $request->product_quantity;
            $cart->save();
            return redirect(route('cart'))->with('msg','Cart Has Updated Successfully');
        }else{
          return redirect()->back(); 
        }
    }
    public function cartDelete($id){

        $cart = Cart::find($id);
        if(!is_null($cart)){
            $cart->delete();
            return redirect(route('cart'))->with('msg','Cart Delete Has Successfully.');
        }else{
            return redirect()->back();
        }
    }
}
