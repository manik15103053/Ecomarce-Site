@extends('admin.layouts.master')

@section('content')
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
        <h4 class="card-title">Edit District</h4>
        <form method="POST" action="{{route('district.update',$district->id)}}">
          @csrf
          <div class="form-group">
            <label for="name">District Name</label>
            <input required type="text" name="name"class="form-control" id="name"  value="{{$district->name}}">
          </div>
      
         
          <div class="form-group">
            <label for="prority">Select Division</label>
            <div class="row">
              <div class="col-md-12">
                <select name="division_id" id="division_id"class="form-control">
                  <option value="">Please Select The Division for the District</option>
                  @foreach ($division as $division)
                  <option value="{{$division->id}}" {{$district->division->id == $division->id ? 'selected': ''}}>{{$division->name}}</option>
                      
                  @endforeach
                </select>
              </div>
            
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('district.create')}}"class="btn btn-danger">BACK</a>
        </form>
               
            </div>
            
        </div>
      </div>
@endsection

