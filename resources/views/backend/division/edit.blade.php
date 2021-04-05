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
        <form method="POST" action="{{route('division.update',$division->id)}}">
          @csrf
          <div class="form-group">
            <label for="name">Division Name</label>
            <input required type="text"required name="name"class="form-control" id="name"  value="{{$division->name}}">
          </div>
      
         
          <div class="form-group">
            <label for="prority">Priority</label>
            <div class="row">
              <div class="col-md-12">
                <input required type="text" name="priority" id="priority"value="{{$division->priority}}"class="form-control">
              </div>
            
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{route('division.create')}}"class="btn btn-danger">BACK</a>
        </form>
               
            </div>
            
        </div>
      </div>
@endsection

