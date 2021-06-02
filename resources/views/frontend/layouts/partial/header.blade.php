<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('product.index')}}">Product</a>
        </li>
        <li class="nav-item">
          <form class="d-flex"method="GET"action="{{route('product.search')}}">
            @csrf
          <div class="input-group mb-3">
      <input type="text" class="form-control" name="search"placeholder="Searce" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-outline-secondary" type="submit" id="search"><i class="metarial icons" aria-hidden="true">search</i></button>
    </div>
          </form>
        </li>
        
        
      </ul>
      <u class="navbar-nav ml-auto ">
        <li >
    
          <a class="nav-link"href="{{route('cart')}}">
            <button class="btn btn-danger">
              <span class="mt-1">Cart</span>
              <span class="badge badge-warning">
                
              {{ App\Models\Cart::totaltems() }}
              </span>

            </button>
          </a>
         </li>
        @guest
        <li >
    
         <a class="nav-link"href="{{route('user.login')}}">Login</a>
        </li>
        <li >
     
          <a class="nav-link"href="{{route('registration.create')}}">Registration</a>
          
        </li>
        @else
        <li >
     
          <a class="nav-link"href="{{route('user.dashboard')}}">Dashboard</a>
          
        </li>
         @endguest 
      
        
        <li >
          @if (auth()->user())

          <a class="nav-link"href="{{route('logout')}}">Logout</a>
          @endif
          
          
        </li>
      </u>
      
    </div>
   
  </div>
   
 </div>
 
</nav>