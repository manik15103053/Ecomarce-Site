@extends('master')


@section('content')
<div class="container" style="margin-top: 20px;">
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
            <div class="alert alert-primary">
                {{ Session::get('msg') }}
            </div>
        @endif
        <h4 class="card-title">User Registration</h4>
        <form method="POST" action="{{route('registration.store')}}"enctype="multipart/form-data"style="width:70%;">
          @csrf
          <div class="form-group">
            <label for="first_name">First Name</label>
            <input required type="text" name="first_name"class="form-control" id="first_name">
          </div>
          <div class="form-group">
            <label for="last_name">Last Name</label>
            <input required type="text" name="last_name"class="form-control" id="last_name">
          </div>
          <div class="form-group">
            <label for="username">User Name</label>
            <input required type="text" name="username"class="form-control" id="username">
          </div>
          <div class="form-group">
            <label for="email">Email Address</label>
            <input required type="text" name="email"class="form-control" id="email"placeholder=" ">
          </div>
          <div class="form-group">
            <label for="phone">Phone No</label>
            <input required type="text" name="phone"class="form-control" id="phone"placeholder=" ">
          </div>
          <div class="form-group">
            <label for="phone">Division</label>
            <select name="division_id" id="Division_id"class="form-control">
                <option value="">Please Select Your Division</option>
                @foreach ($division as $division)
                <option value="{{$division->id}}">{{$division->name}}</option>
                    
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="phone">District</label>
            <select name="district_id" id="district_id"class="form-control">
                <option value="">Please Select Your District</option>
                @foreach ($district as $district)
                <option value="{{$district->id}}">{{$district->name}}</option>
                    
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="street_address">Street Address</label>
            <input required type="text" name="street_address"class="form-control" id="street_address"placeholder="">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" name="password"class="form-control" id="password"placeholder="">
          </div>
          <div class="form-group">
            <label for="image">Feeture Image</label>
            <input  type="file" name="image"class="form-control" id="image"placeholder="">
          </div>
      
         
          
          
          <button style="margin-top: 10px" type="submit" class="btn btn-primary">Register</button>
        </form>
               
            </div>
            
        </div>
      </div>
    </div>
</div>
    
@endsection