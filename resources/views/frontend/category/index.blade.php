@extends('master')


@section('content')
<div class="container margin-top">
  <div class="row">

      
    <div class="col-md-4">
      @include('frontend.layouts.partial.sideber')
      </div>
      
      <div class="col-md-8">
    

        <div class="widget">

            <h3>All Products in <span class="btn btn-info">{{$category->name}} Category</span></h3>
            @php
               $product = $category->products()->paginate(5); 
            @endphp
            <div class="row">
        
              @if ($product->count() > 0)
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
                    <a href="#" class="btn btn-outline-warning">Add to cart</a>
                  </div>
                </div>
              </div>
              @endforeach

                  
              @else
                  <div class="alert alert-warning">
                    No products has added yet in this Category !!

                  </div>
              @endif
            </div>
          </div>


            <div class="widget">
              
            </div>
      </div>
  </div>
</div>
    
@endsection