<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommarce Site</title>
    <!-- plugins:css -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/admin')}}/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     @include('admin.layouts.partial.header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
       
        @include('admin.layouts.partial.navber')
        <!-- partial -->
        <div class="main-panel">
          @yield('content')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.layouts.partial.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/admin')}}/vendors/js/vendor.bundle.base.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('assets/admin')}}/js/shared/off-canvas.js"></script>
    <script src="{{asset('assets/admin')}}/js/shared/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('assets/admin')}}/js/demo_1/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script src="{{asset('assets/admin')}}/js/shared/jquery.cookie.js" type="text/javascript"></script>
  </body>
</html>