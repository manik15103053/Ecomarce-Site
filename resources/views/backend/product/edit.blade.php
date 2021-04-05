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
        <h4 class="card-title">Edit Product</h4>
        <form method="POST" action="{{route('admin.product.update',$product->id)}}"enctype="multipart/form-data"style="width:60%;">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text"required name="title"value="{{$product->title}}"class="form-control" id="title"  placeholder="Title">
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number"required name="quantity"value="{{$product->quantity}}"class="form-control" id="quantity" placeholder="Quantity">
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="number" required name="price"value="{{$product->price}}"class="form-control" id="price" placeholder="Price">
            </div>
            <div class="form-group">
              <label for="price">Select Category</label>
              <select name="category_id" id="category_id"class="form-control">
                <option value="">Please Select a Category For The Product</option>
                @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                <option value="{{$parent->id}}"{{$parent->id == $product->category->id ? 'selected' : ''}}>{{$parent->name}}</option>
                @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                <option value="{{$child->id}}"{{$child->id == $product->category->id ? 'selected' : ''}}>-------->{{$child->name}}</option>
                    
                @endforeach
                    
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="price">Select Brands</label>
              <select name="brand_id" id="brand_id"class="form-control">
                <option value="">Please Select a Brands For The Product</option>
                @foreach (App\Models\Brand::orderBy('name','asc')->get() as $br)
                <option value="{{$br->id}}" {{$br->id == $product->brand->id ? 'selected' : ''}}>{{$br->name}}</option>
                
                    
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="product_image">Product Image</label>
              <div class="row">
                <div class="col-md-6">
                  <input type="file"name="product_image[]"id="product_image"class="form-control">
  
                </div>
                <div class="col-md-6">
                  <input type="file"name="product_image[]"id="product_image"class="form-control">
  
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control"id="description" cols="30" rows="3">{{$product->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('admin.create.product')}}"class="btn btn-danger">BACK</a>

          </form>
               
            </div>
            
        </div>
      </div>
@endsection

