@extends('master')






@section('content')
<div class="container" style="margin-top: 20px;text:center">
  <div class="content-wrapper">
   
    <div class="row">
        
      <div class="col-lg-10 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            @if ($errors->any())
               
                        @foreach ($errors->all() as $error)
                            <p class="btn btn-danger">{{ $error }}</p>
                        @endforeach
                  
            @endif
            @if(Session::has('msg'))
            <div class="alert alert-danger">
                {{ Session::get('msg') }}
            </div>
        @endif
        <h4 class="card-title">Login Form</h4>
        <form method="POST" action="{{route('login')}}"style="width:70%;">
          @csrf
         
         
          <div class="form-group">
            <label for="email">Email </label>
            <input required type="text" name="email"class="form-control" id="email"placeholder=" ">
          </div>
          
          
          <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" name="password"class="form-control" id="password"placeholder="">
          </div>
      
         
          
          
          <button style="margin-top: 10px" type="submit" class="btn btn-primary">Login</button>
        </form>
               
            </div>
            
        </div>
      </div>
    </div>
</div>
    
@endsection
    
