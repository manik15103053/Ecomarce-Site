<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{asset('assets/admin')}}/images/faces/face8.jpg" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">Allen Moreno</p>
          <p class="designation">Premium user</p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="active nav-item">
      <a class="nav-link" href="{{ route('admin.index')}}">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="{{ route('admin.create.product')}}">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Product</span>
      </a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="{{route('admin.category.create')}}">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Category</span>
      </a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="{{route('brand.create')}}">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Brands</span>
      </a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="{{route('division.create')}}">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Division</span>
      </a>
    </li>
    <li class=" nav-item">
      <a class="nav-link" href="{{route('district.create')}}">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage District</span>
      </a>
    </li>
    

    

   
  </ul>
</nav>