@extends('admin.layouts.master')


@section('content')
 <div class="main-panel">
   <div class="content-wrapper">
     <div class="card card-body">
       <h3>Welcome to Your Admin Panel</h3>
       <br>
       <br>
       <p>
        <a href="{{route('home')}}"class="btn btn-primary btn-lg"target="_blank">Visite Main Site</a>

       </p>
     </div>
   </div>
 </div>
  
@endsection