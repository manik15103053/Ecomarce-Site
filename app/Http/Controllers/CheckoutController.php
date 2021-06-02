<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutIndex(){
        $payments =  Payment::orderBy('priority','asc')->get();
        //dd($payments->all());
        return view('frontend.layouts.checkout',compact('payments'));
    }
}
