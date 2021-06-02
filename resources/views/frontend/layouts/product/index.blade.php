@extends('master')


@section('content')
<div class="container margin-top">
  <div class="row">

      
    <div class="col-md-4">
      @include('frontend.layouts.partial.sideber')
      </div>
      
      <div class="col-md-8">
    

        <div class="widget">

            <h3>Featured Products</h3>
            <div class="row">
        
              @foreach ($product as $product)
                  
              
              <div class="col-md-3">
                <div class="card" >
                  @php $i = 1; @endphp
        
                  @foreach ($product->images as $image)
        
                  @if ( $i > 0 ) 
                 
                  <img height="200" class="card-img-top feature-image" src="{{asset('images/product/'.$image->image)}}" alt="{{$image->title}}">
                  @endif
                  @php $i--; @endphp
                  @endforeach
                  <div class="card-body">
                    <h5 class="card-title">
                        {{$product->title}}
                      
        
                    </h5>
                    <p class="card-text">Taka - {{$product->price}}</p>
                    @include('frontend.layouts.partial.cart_button')

                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>


            <div class="widget">
              
            </div>
      </div>
  </div>
</div>
    
@endsection