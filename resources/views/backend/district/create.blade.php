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
                    <span>Add District</span>
                    </a>
                </h2>
               
            </div>
            <h4 class="card-title">District Table</h4>
            <table class="table table-hover table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>District Name.</th>
                  <th>Division Name.</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($district as $key=>$div)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$div->name}}</td>
                <td>{{$div->division->name}}</td>
                
                <td>{{$div->created_at}}</td>
                <td>{{$div->updated_at}}</td>
               
                
                <td>
                 <a href="{{route('district.edit',$div->id)}}"class="btn btn-info waves-effect">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('district.delete',$div->id)}}"class="btn btn-danger waves-effect">
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
        <h5 class="modal-title" id="exampleModalLabel">Add District</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('district.store')}}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">District Name</label>
            <input type="text"required name="name"class="form-control" id="name"  placeholder="Division Nane">
          </div>
          
          <div class="form-group">
            <label for="image">Seletct The Division</label>
            <div class="row">
              <div class="col-md-12">
                <select name="division_id" id="division_id"class="form-control">
                  <option value="">Please Select The Division for the District</option>
                  @foreach ($division as $division)
                  <option value="{{$division->id}}">{{$division->name}}</option>
                      
                  @endforeach
                </select>
              </div>
            
            </div>
          </div>
         
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
   
    </div>
  </div>
</div>

@endsection