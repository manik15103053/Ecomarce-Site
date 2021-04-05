@extends('master')


@section('content')
<div class="container margin-top">
  <div class="row">
    <div class="col-md-4">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @php
              $i = 1;
          @endphp
          @foreach ($product->images as $image)
          <div class=" carousel-item {{$i == 1 ? 'active': ''}}"style="background: #dcf4fc;">
            <img class="d-block w-100" src="{{asset('images/product/'.$image->image)}}" alt="First slide">
          </div> 
          @php
            $i ++;  
          @endphp 
          @endforeach
          
          
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div class="mt-3">

        <p>Category <span class="btn btn-warning">{{$product->category->name}}</span></p>
        <p>Brand <span class="btn btn-warning">{{$product->brand->name}}</span></p>

      </div>
    </div>
    
      <div class="col-md-8">
    

        <div class="widget">

            <h3>{{$product->title}}</h3>
            <h3>{{$product->price}} Taka
              <button type="button" class="btn btn-primary">
             
              
            <span class="badge badge-light"style="font-size:15px">

              {{ $product->quantity <1 ? 'No Item is Available':$product->quantity.' Item In Stock' }}
            </span>
          </button>
            </h3>
            <br>
            <div class="product-description">
              {{$product->description}}

            </div>
            <div class="row">
        
            
            </div>
          </div>


            <div class="widget">
              
            </div>
      </div>
  </div>
</div>
    
@endsection