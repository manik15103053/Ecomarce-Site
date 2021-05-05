@extends('frontend.user.master')
@section('sub-content')
  <div class="container">
    <div class="card-body mb-5">
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
    <h4 class="card-title">User Update Profile</h4>
    <form method="POST" action="{{route('user.update')}}"enctype="multipart/form-data"style="width:70%;">
      @csrf
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input required type="text"value="{{$user->first_name}}" name="first_name"class="form-control" id="first_name">
      </div>
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input required type="text" value="{{$user->last_name}}" name="last_name"class="form-control" id="last_name">
      </div>
      <div class="form-group">
        <label for="username">User Name</label>
        <input required type="text" value="{{$user->username}}"name="username"class="form-control" id="username">
      </div>
      <div class="form-group">
        <label for="email">Email Address</label>
        <input required type="text" value="{{$user->email}}"name="email"class="form-control" id="email"placeholder=" ">
      </div>
      <div class="form-group">
        <label for="phone">Phone No</label>
        <input required type="text" value="{{$user->phone}}"name="phone"class="form-control" id="phone"placeholder=" ">
      </div>
      <div class="form-group">
        <label for="phone">Division</label>
        <select name="division_id" id="Division_id"class="form-control">
            <option value="">Please Select Your Division</option>
            @foreach ($division as $division)
            <option value="{{$division->id}}"{{$user->division_id == $division->id ? 'selected' :''}}>{{$division->name}}</option>
                
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="phone">District</label>
        <select name="district_id" id="district_id"class="form-control">
            <option value="">Please Select Your District</option>
            @foreach ($district as $district)
            <option value="{{$district->id}}"{{$user->district_id == $district->id ? 'selected' :''}}>{{$district->name}}</option>
                
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="street_address">Street Address</label>
        <input required type="text" value="{{$user->street_address}}"name="street_address"class="form-control" id="street_address"placeholder="">
      </div>
      <div class="form-group">
        <label for="shipping_address">Shipping Address</label>
        <textarea name="shipping_address" id="shipping_address"class="form-control" cols="30" rows="3">{{$user->shipping_address}}</textarea>
      </div>
      <div class="form-group">
        <label for="image">Feeture Image</label>
        <input  type="file" name="image"class="form-control" id="image"placeholder="">
      </div>
  
     
      
      
      <button style="margin-top: 10px;mb-5" type="submit" class="btn btn-primary">Update</button>
    </form>
           
        </div>
  </div>
@endsection