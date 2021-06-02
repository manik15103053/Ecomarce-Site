@extends('master')


@section('content')

<div class="container margin-top-20">
    
  <h2>My Cart Items
      
  </h2>
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
  <table class="table table-bordered table-stripe">
     <thead>
         <th>No.</th>
         <th>Product Title</th>
         <th>Product Image</th>
         <th>Product Quantity</th>
         <th>Unite Price</th>
         <th>Sub Total Price</th>
         <th>Delete</th>
     </thead>
     @php
         $total_price = 0;
     @endphp

    @foreach (App\Models\Cart::totalCart() as $cart )
    <tbody>
        <tr>
            <td>
                {{$loop->index + 1}}
            </td>
            <td>
                {{$cart->product->title}}
            </td>
            <td>
                @if ($cart->product->images->count() > 0)
                    <img src="{{asset('images/product/'.$cart->product->images->first()->image)}}"width="50px">
                @endif
            </td>
            <td>
               <form class="form-inline"action="{{route('cart.update',$cart->id)}}" method="POST">
                   @csrf
                   <input type="number"name="product_quantity"class="form-control "value="{{$cart->product_quantity}}">
                   <button type="submit"class="btn btn-success mt-2 ">Update</button>
               </form>
           </td>
           <td>
            {{$cart->product->price}} Taka
        </td>
        <td>
            @php
                $total_price += $cart->product->price * $cart->product_quantity
            @endphp
         {{$cart->product->price * $cart->product_quantity}} Taka
        </td>
           <td>
               <form class="form-inline" action="{{route('cart.delete',$cart->id)}}" method="POST">
                   @csrf
                   <input type="hidden"name="cart_id">
                   <button type="submit"class="btn btn-danger ">Delete</button>
               </form>
           </td>
          
        </tr>
  
    @endforeach
    <tr>
        <td colspan="4"></td>
        <td >Total Amount:</td>
        <td colspan="2">
          <strong>
            {{$total_price}} Taka  
          </strong>
        </td>
    </tr>
</tbody>
  </table>
  <div class="float-right">
      <a href="{{route('product.index')}}"class="btn btn-info btn-lg float:right">Continue Shopping..</a>
      <a href="{{route('checkout')}}"class="btn btn-warning btn-lg">Checkout</a>

  </div>
</div>
    
@endsection