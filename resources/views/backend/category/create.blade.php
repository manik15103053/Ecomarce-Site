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
                    <span>Add Category</span>
                    </a>
                </h2>
               
            </div>
            <h4 class="card-title">Category Table</h4>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Category Name.</th>
                  <th>Category Image.</th>
                  <th>Parent Category</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($categories as $key=>$category)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$category->name}}</td>
                <td>
                  <img src="{{asset('images/categories/'.$category->image)}}" width="100">
                </td>
                <td>
                  @if($category->parent_id == null)
                  Primary Category
                  @else
                  {{$category->parent->name}}
                  @endif
                </td>
                
                <td>
                 <a href="{{route('admin.category.edit',$category->id)}}"class="btn btn-info waves-effect">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.category.delete',$category->id)}}"class="btn btn-danger waves-effect">
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
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('admin.category.store')}}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text"required name="name"class="form-control" id="name"  placeholder="Category Nane">
          </div>
          <div class="form-group">
            <label for="parent_id">Parent Category</label>
            <select name="parent_id" id=""class="form-control">
              <option value="">Please Select a primary Category</option>

              @foreach ($main_category as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="image">Category Image</label>
            <div class="row">
              <div class="col-md-12">
                <input type="file"name="image"id="image"class="form-control">

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