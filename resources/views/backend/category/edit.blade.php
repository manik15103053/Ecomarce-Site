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
        <h4 class="card-title">Edit Category</h4>
        <form method="POST" action="{{route('admin.category.update',$category->id)}}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text"required name="name"class="form-control" id="name"  value="{{$category->name}}">
          </div>
          <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select name="parent_id" id=""class="form-control">
              <option value="">Please Select a primary Category</option>
              @foreach ($main_category as $cat)
                  <option value="{{$cat->id}}"{{$cat->id == $category->parent_id ? 'selected' : ''}}>{{$cat->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="old_image">Category Old Image</label>
            <div class="row">
              <img src="{{asset('images/categories/'.$category->image)}}" width="100">
            
            </div>
          </div>
          <div class="form-group">
            <label for="image">Category New Image</label>
            <div class="row">
              <div class="col-md-12">
                <input type="file"name="image"id="image"class="form-control">

              </div>
            
            </div>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control"id="description" cols="30" rows="3">{{$category->name}}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('admin.category.create')}}"class="btn btn-danger">BACK</a>
        </form>
               
            </div>
            
        </div>
      </div>
@endsection

