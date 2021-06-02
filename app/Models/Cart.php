<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    // Total Cart Items
    public static function totalCart(){
        if(Auth::check()){
            $cart = Cart::orWhere('user_id',Auth::id())
                ->orWhere('ip_address',request()->ip())
                ->get();
        }else{
            $cart = Cart::orWhere('ip_address',request()->ip())
                ->get();
        }
       
        
        return $cart;
    }

    ///Total Items
    public static function totaltems(){
        if(Auth::check()){
            $cart = Cart::orWhere('user_id',Auth::id())
                ->orWhere('ip_address',request()->ip())
                ->get();
        }else{
            $cart = Cart::orWhere('ip_address',request()->ip())
                ->get();
        }
        $total_item = 0;
        foreach($cart as $cart){
            $total_item += $cart->product_quantity;
        }
        
        return $total_item;
    }
}
