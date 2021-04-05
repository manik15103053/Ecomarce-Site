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
        <h4 class="card-title">Edit Brand</h4>
        <form method="POST" action="{{route('brand.update',$brands->id)}}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Brand Name</label>
            <input type="text"required name="name"class="form-control" id="name"  value="{{$brands->name}}">
          </div>
      
          <div class="form-group">
            <label for="old_image">Brand Old Image</label>
            <div class="row">
              <img src="{{asset('images/brands/'.$brands->image)}}" width="100">
            
            </div>
          </div>
          <div class="form-group">
            <label for="image">Brand New Image</label>
            <div class="row">
              <div class="col-md-12">
                <input type="file"name="image"id="image"class="form-control">

              </div>
            
            </div>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"id="description" cols="30" rows="3">{{$brands->name}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('brand.create')}}"class="btn btn-danger">BACK</a>
        </form>
               
            </div>
            
        </div>
      </div>
@endsection

