@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
   
    <div class="row">
        
      <div class="col-lg-12 grid-margin stretch-card">
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
            <div class="header"style="margin-bottom:20px;">
                <h2>
                    <a class="btn btn-primary waves-effect "href=""data-toggle="modal" data-target="#exampleModal">
                    <i class="material-icons">add</i>
                    <span>Add Product</span>
                    </a>
                </h2>
               
            </div>
            <h4 class="card-title">Product Table</h4>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Title.</th>
                  <th>price</th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($products as $key=>$product)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$product->title}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->status}}</td>
                <td>
                 <a href="{{route('admin.product.edit',$product->id)}}"class="btn btn-info waves-effect">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.product.delete',$product->id)}}"class="btn btn-danger waves-effect">
                  <i class="material-icons">delete</i>
              </a>

                </td>
                
              </tr>
                  
              @endforeach
              
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('product.store')}}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text"required name="title"class="form-control" id="title"  placeholder="Title">
          </div>
          <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number"required name="quantity"class="form-control" id="quantity" placeholder="Quantity">
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" required name="price"class="form-control" id="price" placeholder="Price">
          </div>
          <div class="form-group">
            <label for="price">Select Category</label>
            <select name="category_id" id="category_id"class="form-control">
              <option value="">Please Select a Category For The Product</option>
              @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
              <option value="{{$parent->id}}">{{$parent->name}}</option>
              @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
              <option value="{{$child->id}}">-------->{{$child->name}}</option>
                  
              @endforeach
                  
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="price">Select Brands</label>
            <select name="brand_id" id="brand_id"class="form-control">
              <option value="">Please Select a Brands For The Product</option>
              @foreach (App\Models\Brand::orderBy('name','asc')->get() as $brand)
              <option value="{{$brand->id}}">{{$brand->name}}</option>
              
                  
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
            <textarea name="description" class="form-control"id="description" cols="30" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
   
    </div>
  </div>
</div>

@endsection