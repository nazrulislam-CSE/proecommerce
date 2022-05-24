<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backEnd/images/favicon.ico ' )}}">

    <title>Admin Dashboard</title>


  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="{{ asset('backEnd/css/bootstrap.min.css') }}">

  <!-- Customizable CSS -->
  <!-- <link rel="stylesheet" href="{{ asset('backEnd/css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/owl.carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/owl.transitions.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/rateit.css') }}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/bootstrap-select.min.css') }}"> -->

  <!-- Icons/Glyphs -->
  <link rel="stylesheet" href="{{ asset('backEnd/css/font-awesome.css') }}">
  <!-- Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
    
  <!-- Vendors Style-->
  <link rel="stylesheet" href="{{ asset('backEnd/css/vendors_css.css')}}">
  <!-- Style-->  
  <link rel="stylesheet" href="{{ asset('backEnd/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('backEnd/css/skin_color.css')}}">
  <!-- toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
  <link rel="stylesheet" href="{{ asset('backEnd/toastr.min.css') }}">
  <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
  
<div class="wrapper">

  <header class="main-header">
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top pl-30">
      <!-- Sidebar toggle button-->
    <div>
      <ul class="nav">
      <li class="btn-group nav-item">
        <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" data-toggle="push-menu" role="button">
          <i class="nav-link-icon mdi mdi-menu"></i>
          </a>
      </li>
      <li class="btn-group nav-item">
        <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="Full Screen">
          <i class="nav-link-icon mdi mdi-crop-free"></i>
          </a>
      </li>     
      <li class="btn-group nav-item d-none d-xl-inline-block">
        <a href="#" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
          <i class="ti-check-box"></i>
          </a>
      </li>
      <li class="btn-group nav-item d-none d-xl-inline-block">
        <a href="calendar.html" class="waves-effect waves-light nav-link rounded svg-bt-icon" title="">
          <i class="ti-calendar"></i>
          </a>
      </li>
      </ul>
    </div>
    
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
      <!-- full Screen -->
        <li class="search-bar">     
        <div class="lookup lookup-circle lookup-right">
           <input type="text" name="s">
        </div>
      </li>     
      <!-- Notifications -->
      <li class="dropdown notifications-menu">
      <a href="#" class="waves-effect waves-light rounded dropdown-toggle" data-toggle="dropdown" title="Notifications">
        <i class="ti-bell"></i>
      </a>
      <ul class="dropdown-menu animated bounceIn">

        <li class="header">
        <div class="p-20">
          <div class="flexbox">
            <div>
              <h4 class="mb-0 mt-0">Notifications</h4>
            </div>
            <div>
              <a href="#" class="text-danger">Clear All</a>
            </div>
          </div>
        </div>
        </li>

        <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu sm-scrol">
          <li>
          <a href="#">
            <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
          </a>
          </li>
          <li>
          <a href="#">
            <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
          </a>
          </li>
          <li>
          <a href="#">
            <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
          </a>
          </li>
          <li>
          <a href="#">
            <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
          </a>
          </li>
          <li>
          <a href="#">
            <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
          </a>
          </li>
          <li>
          <a href="#">
            <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
          </a>
          </li>
          <li>
          <a href="#">
            <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
          </a>
          </li>
        </ul>
        </li>
        <li class="footer">
          <a href="#">View all</a>
        </li>
      </ul>
      </li> 
      
        <!-- User Account-->
          <li class="dropdown user user-menu">  
      <a href="#" class="waves-effect waves-light rounded dropdown-toggle p-0" data-toggle="dropdown" title="User">
        <img src="{{ asset('backEnd/images/avatar/avatar-1.png ') }}" alt="">
      </a>
      <ul class="dropdown-menu animated flipInX">
        <li class="user-body">
         <a class="dropdown-item" href="#"><i class="ti-user text-muted mr-2"></i> Profile</a>
         <a class="dropdown-item" href="#"><i class="ti-wallet text-muted mr-2"></i> My Wallet</a>
         <a class="dropdown-item" href="#"><i class="ti-settings text-muted mr-2"></i> Settings</a>
         <div class="dropdown-divider"></div>
         <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                  this.closest('form').submit();" class="dropdown-item">
                  <i class="ti-lock text-muted mr-2"></i> Logout
              </a>
          </form>
        </li>
      </ul>
          </li> 
      <li>
              <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light">
          <i class="ti-settings"></i>
        </a>
          </li>
      
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar"> 
    
        <div class="user-profile">
      <div class="ulogo">
         <a href="index.html">
          <!-- logo for regular state and mobile devices -->
           <div class="d-flex align-items-center justify-content-center">           
              <img src="{{ asset('backEnd/images/logo-dark.png ') }}" alt="">
              <h3><b>Ecommerce</b></h3>
           </div>
        </a>
      </div>
        </div>
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">  
        
        <li class="{{ ($route == 'dashboard')? 'active':'' }}">
          <a href="{{ route('dashboard') }}">
            <i data-feather="pie-chart"></i>
              <span>Dashboard</span>
          </a>
        </li>  
        
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="ti-more"></i>Admin Profile</a></li>
            <li><a href="#"><i class="ti-more"></i>Admin Password Change</a></li>
          </ul>
        </li>

        <li class="treeview 
        {{ ($route == 'brand.all')? 'active':'' }}
        {{ ($route == 'brand.edit')? 'active':'' }}
        {{ ($route == 'brand.trashed')? 'active':'' }}">
          <a href="#" class="nav-link @yield('sub.category')">
            <i data-feather="message-circle"></i>
            <span>Brands</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('brand.all') }}"><i class="ti-more"></i>All Brand</a></li>
            <li><a href="{{ route('brand.trashed') }}"><i class="ti-more"></i>Trashed Brand</a></li>
          </ul>
        </li>

        <li class="treeview 
        {{ ($route == 'category.all')? 'active':'' }}
        {{ ($route == 'subcategory.all')? 'active':'' }}
        {{ ($route == 'subsubcategory.all')? 'active':'' }}
        {{ ($route == 'category.edit')? 'active':'' }}
        {{ ($route == 'subcategory.edit')? 'active':'' }}
        {{ ($route == 'subsubcategory.edit')? 'active':'' }}
        {{ ($route == 'category.trashed')? 'active':'' }}
        {{ ($route == 'subcategory.trashed')? 'active':'' }}
        {{ ($route == 'subsubcategory.trashed')? 'active':'' }}">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('category.all') }}"><i class="ti-more"></i>All Category</a></li>
            <li><a href="{{ route('category.trashed') }}"><i class="ti-more"></i>Trashed Category</a></li>
            <li><a href="{{ route('subcategory.all') }}"><i class="ti-more"></i>All SubCategory</a></li>
            <li><a href="{{ route('subcategory.trashed') }}"><i class="ti-more"></i>Trashed SubCategory</a></li>
            <li><a href="{{ route('subsubcategory.all') }}"><i class="ti-more"></i>All Sub->SubCategory</a></li>
             <li><a href="{{ route('subsubcategory.trashed')}}"><i class="ti-more"></i>Trashed Sub->SubCategory</a></li>
          </ul>
        </li>

        <li class="treeview 
        {{ ($route == 'product.add')? 'active':'' }}
        {{ ($route == 'product.edit')? 'active':'' }}
        {{ ($route == 'product.manage')? 'active':'' }}
        {{ ($route == 'product.trashed')? 'active':'' }}">
          <a href="#" class="nav-link @yield('sub.category')">
            <i data-feather="message-circle"></i>
            <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('product.add') }}"><i class="ti-more"></i>Add Product</a></li>
            <li><a href="{{ route('product.manage') }}"><i class="ti-more"></i>Manage Product</a></li>
            <li><a href="{{ route('product.trashed') }}"><i class="ti-more"></i>Trashed Product</a></li>
          </ul>
        </li>

        <li class="treeview 
        {{ ($route == 'manage.slider')? 'active':'' }}
        {{ ($route == 'slider.edit')? 'active':'' }}
        {{ ($route == 'slider.trashed')? 'active':'' }}">
          <a href="#" class="nav-link">
            <i data-feather="message-circle"></i>
            <span>Sliders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
            <li><a href="{{ route('slider.trashed') }}"><i class="ti-more"></i>Trashed Slider</a></li>
          </ul>
        </li>
          
        <li class="treeview">
          <a href="#">
            <i data-feather="mail"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="ti-more"></i>Inbox</a></li>
            <li><a href="#"><i class="ti-more"></i>Compose</a></li>
            <li><a href="#"><i class="ti-more"></i>Read</a></li>
          </ul>
        </li>

        <li>
          <a href="{{ route('logout') }}">
            <i data-feather="lock"></i>
            <span>Log Out</span>
          </a>
        </li> 
          
      </ul>
    </section>
  
  <div class="sidebar-footer">
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
  </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
 @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
      <li class="nav-item">
      <a class="nav-link" href="javascript:void(0)">FAQ</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Purchase Now</a>
      </li>
    </ul>
    </div>
    &copy; 2022 <a href="#">Ecomarce Website By Me</a>. All Rights Reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  <script src="{{ asset('backEnd/js/jquery.min.js ') }}"></script>
  <script src="{{ asset('backEnd/js/jquery.counterup.js ') }}"></script>
  <script src="{{ asset('backEnd/js/jquery.waypoints.js ') }}"></script>

  <!-- Vendor JS -->
  <script src="{{ asset('backEnd/js/vendors.min.js') }}"></script>
  <script src="{{ asset('assets/icons/feather-icons/feather.min.js ') }}"></script>  
  <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
  <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
  <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
  <!-- datatable -->
  <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script> 
  <script src="{{ asset('../assets/vendor_components/datatable/datatables.min.js ') }}"></script>
  <script src="{{ asset('backEnd/js/pages/data-table.js ') }}"></script>
  <!-- Sunny Admin App -->
  <script src="{{ asset('backEnd/js/template.js') }}"></script>
  <script src="{{ asset('backEnd/js/pages/dashboard.js') }}"></script>

  <!-- JavaScripts placed at the end of the document so the pages load faster --> 
  <!-- <script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script> 
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
  <script src="{{ asset('assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script> 
  <script src="{{ asset('assets/js/echo.min.js') }}"></script> 
  <script src="{{ asset('assets/js/jquery.easing-1.3.min.js') }}"></script> 
  <script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script> 
  <script src="{{ asset('assets/js/jquery.rateit.min.js') }}"></script> 
  <script type="text/javascript" src="{{ asset('assets/js/lightbox.min.js') }}"></script> 
  <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script> 
  <script src="{{ asset('assets/js/wow.min.js') }}"></script> 
  <script src="{{ asset('assets/js/scripts.js') }}"></script> -->

  <!-- toastr js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- toastr js -->
  <script src="{{asset('backEnd/toastr.min.js') }}"></script>
  <!-- summernote -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <!--  input tags -->
  <script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js ') }}"></script>
  <!-- ck editor -->
  <script src="{{ asset('../assets/vendor_components/ckeditor/ckeditor.js ') }}"></script>
  <script src="{{ asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js ') }}"></script>
  <script src="{{ asset('backEnd/js/pages/editor.js') }}"></script>
  <!--  bootstrap -->


<!-- counter up -->
<script>
  $('#count').counterUp({
    delay: 10,
    time: 1000
});
</script>
<!-- totastr section -->
  <script type="text/javascript">
    // Category Section Start //
      @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
      @endif
      @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}");
      @endif
      @if(Session::has('error'))
        toastr.info("{{Session::get('error')}}");
      @endif
      @if(Session::has('warning'))
        toastr.warning("{{Session::get('warning')}}");
      @endif
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- sweetalert js -->
  <script src="{{asset('backEnd/sweetalert2@10.js') }}"></script>
  <!-- sweetalerat delete data -->
  <script type="text/javascript">
    $(function(){
      $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure?',
      text: "Delete This Data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })

      });
    });
  </script>
  <!-- sweetalerat trash data -->
  <script type="text/javascript">
    $(function(){
      $(document).on('click','#trash',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

      Swal.fire({
      title: 'Are you sure Trash Data?',
      text: "Trash This Data!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = link
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })

      });
    });
  </script>
<!-- start Brand img -->
<script>
  $(document).ready(function(){
      $('#brand_image').change(function(event){
          var reader = new FileReader();
          reader.onload = function(event){
              $('#brand_showImage').attr('src',event.target.result);
          }
          reader.readAsDataURL(event.target.files['0']);
      });
  });
</script>
<!-- start slider img -->
<script>
  $(document).ready(function(){
      $('#slider_image').change(function(event){
          var reader = new FileReader();
          reader.onload = function(event){
              $('#slider_showImage').attr('src',event.target.result);
          }
          reader.readAsDataURL(event.target.files['0']);
      });
  });
</script>
<!-- skummernote -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#long_description').summernote({
      placeholder: 'Please some content here'
    });
  });
</script>

</body>
</html>
