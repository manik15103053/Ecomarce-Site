@extends('master')


@section('content')

<div class=" container margin-top-20">
    
    <div class="card card-body mt-4">
       
            <h2>Confirm items</h2>
          <hr>
          <div class="row ">
            <div class="col md-7 border-right">

        
                @foreach (App\Models\Cart::totalCart() as $cart )
               <p>
                   {{$cart->product->title}} - 
                   <strong>{{$cart->product->price}} Taka</strong>
                   - {{$cart->product_quantity}} Item
               </p>
                @endforeach
                <p>
                    <a href="{{route('cart')}}">Change Cart Items</a>
                </p>
                </div>
                <div class="col-md-5">
                    @php
                       $total_price = 0; 
                    @endphp
                    @foreach (App\Models\Cart::totalCart() as $cart )
                    @php
                        $total_price += $cart->product->price * $cart->product_quantity; 
                    @endphp
                     @endforeach
                     <p>
                         Total Price: <Strong>{{$total_price}}</Strong>
                     </p>
                     <p>
                        Total Price with Shipping Cost: <Strong>{{$total_price + App\Models\Setting::first()->shipping_cost }} Taka</Strong>
                    </p>
                </div>
          </div>

      
    </div>
    <div class="card card-body mt-2">
        <h2>Shipping Address</h2>
        @if ($errors->any())
               
        @foreach ($errors->all() as $error)
            <p class="btn btn-danger">{{ $error }}</p>
        @endforeach
  
@endif
@if(Session::has('msg'))
<div class="alert alert-primary">
{{ Session::get('msg') }}
</div>
@endif

<form method="POST" action=""enctype="multipart/form-data"style="width:70%;">
@csrf
<div class="form-group">
<label for="first_name">Recever Name</label>
<input required type="text" value="{{Auth::check() ? Auth::user()->first_name. ' ' .Auth::user()->last_name:''}}"name="name"class="form-control" id="first_name">
</div>


<div class="form-group">
<label for="email">Email Address</label>
<input required type="text" value="{{Auth::check() ? Auth::user()->email:''}}"name="email"class="form-control" id="email"placeholder=" ">
</div>
<div class="form-group">
<label for="phone">Phone No</label>
<input required type="text" value="{{Auth::check() ? Auth::user()->phone:''}}"name="phone"class="form-control" id="phone"placeholder=" ">
</div>


<div class="form-group">
<label for="street_address">Shippng Address (Optional)</label>
<textarea name="shipping_address" class="form-control"id="shipping_address" cols="30" rows="3">{{Auth::check() ? Auth::user()->shipping_address:''}}</textarea>
</div>

<div class="form-group">
    <label for="street_address"></label>
    <select name="payment_method_id" class="form-control"required id="payments">
        <option value="">Select a Payment Method Please</option>
        
        @foreach ($payments as $payment )
        <option value="{{$payment->id}}">{{$payment->name}}</option>
        @endforeach

    </select>
    @foreach ($payments as $payment)
        <div id="paymentDiv"class="hidden">
        
             @if ($payment->short_name == "cash_in")
             <div>
                 <h3>
                     For Cash in there is nothing necessry.Just Click Finish Order.
                 </h3>
                 <br>
                 <small>
                     You will get your product in two or three business days.
                 </small>
             </div>
             @else
            <div>
               <h3>{{$payment->name}} Payment</h3>
               <p>
                   <strong>{{$payment->name}} No: {{$payment->no}}</strong>
                   <br>
                   <strong>Account Type: {{$payment->type}}</strong>
               </p>
               <div class="alert alert-success">
                   Please send the above money to this Bkash No and write your transaction code below there...
               </div>
                    <input type="text"name="transaction_id" class="form-control">
            </div>
                 
             @endif
         

        </div>
    @endforeach
</div>




<button style="margin-top: 10px" type="submit" class="btn btn-primary">Order Now</button>
</form>
    </div>
  
</div>

    
@endsection
@section('scripts')
<script src="js/custom.js" type="text/javascript">
$("#payments").change(function(){
    $("#paymentDiv").removeClass('hidden');

});

</script>
@endsection