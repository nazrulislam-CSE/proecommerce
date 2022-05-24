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
  <!-- toastr -->
  <link rel="stylesheet" href="{{ asset('backEnd/toastr/toastr.min.css ') }}">
  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
  
<div class="wrapper">

  @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
 
  @include('admin.body.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('admin')
  <!-- /.content-wrapper -->

  @include('admin.body.footer')
  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>

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

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- toastr js -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <!-- toastr js -->
  <script type="text/javascript" src="{{ asset('backEnd/toastr/toastr.min.js') }}"></script>

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
  
  <!-- all message show link up -->
  <script src="{{asset('backEnd/js/code.js') }}"></script>
  
 
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
