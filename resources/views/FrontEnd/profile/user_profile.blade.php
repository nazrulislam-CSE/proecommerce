<!DOCTYPE html>
<html lang="en">
@php
$seo = App\Models\Seo::find(1);
@endphp
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="{{ $seo->meta_description }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="author" content="{{ $seo->meta_author }}">
<meta name="keywords" content="{{ $seo->meta_keyword }}">
<meta name="robots" content="all">
<!-- // Google Analytics Code // -->
<script>
  {{ $seo->google_analytics }}
</script>

<title>{{ $seo->meta_title }}</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/bootstrap.min.css ') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/main.css ') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/blue.css ') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/owl.carousel.css ') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/owl.transitions.css ') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/animate.min.css ') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/rateit.css ') }}">
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/bootstrap-select.min.css ') }}">



<!-- toastr -->
<link rel="stylesheet" href="{{ asset('frontEnd/toastr/toastr.min.css ') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('frontEnd/assets/css/font-awesome.css ') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>
<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->
    <header class="header-style-1">

        <!-- ============================================== TOP MENU ============================================== -->
        <div class="top-bar animate-dropdown">
            <div class="container">
                <div class="header-top-inner">
                    <div class="cnt-account">
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
                            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                            <li><a href="#"><i class="icon fa fa-lock"></i>Login/Register</a></li>
                        </ul>
                    </div><!-- /.cnt-account -->

                    <div class="cnt-block">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.cnt-cart -->
                    <div class="clearfix"></div>
                </div><!-- /.header-top-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-top -->
        <!-- ============================================== TOP MENU : END ============================================== -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="{{ url('/') }}">

                                <img src="{{ asset('frontEnd/assets/images/logo.png ') }}" alt="">

                            </a>
                        </div><!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->                </div><!-- /.logo-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                        <!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
                            <form>
                                <div class="control-group">

                                    <ul class="categories-filter animate-dropdown">
                                        <li class="dropdown">

                                            <a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li class="menu-header">Computer</li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>

                                            </ul>
                                        </li>
                                    </ul>

                                    <input class="search-field" placeholder="Search here..."/>

                                    <a class="search-button" href="#"></a>

                                </div>
                            </form>
                        </div><!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->                </div><!-- /.top-search-holder -->

                    <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                        <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                        <div class="dropdown dropdown-cart">
                            <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                                <div class="items-cart-inner">
                                    <div class="basket">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </div>
                                    <div class="basket-item-count"><span class="count">2</span></div>
                                    <div class="total-price-basket">
                                        <span class="lbl">cart -</span>
                                        <span class="total-price">
                        <span class="sign">$</span><span class="value">600.00</span>
                    </span>
                                    </div>


                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="cart-item product-summary">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <div class="image">
                                                    <a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-xs-7">

                                                <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                                <div class="price">$600.00</div>
                                            </div>
                                            <div class="col-xs-1 action">
                                                <a href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div><!-- /.cart-item -->
                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="clearfix cart-total">
                                        <div class="pull-right">

                                            <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                        </div>
                                        <div class="clearfix"></div>

                                        <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                    </div><!-- /.cart-total-->


                                </li>
                            </ul><!-- /.dropdown-menu-->
                        </div><!-- /.dropdown-cart -->

                        <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->                </div>
                    <!-- /.top-cart-row -->
                </div><!-- /.row -->

            </div><!-- /.container -->

        </div><!-- /.main-header -->

        <!-- ============================================== NAVBAR ============================================== -->
        <div class="header-nav animate-dropdown">
            <div class="container">
                <div class="yamm navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="nav-bg-class">
                        <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                            <div class="nav-outer">
                                <ul class="nav navbar-nav">
                                    <li class="active dropdown yamm-fw">
                                        <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>

                                    </li>
                                    <li class="dropdown yamm mega-menu">
                                        <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Clothing</a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Men</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Shoes </a></li>
                                                                <li><a href="#">Jackets</a></li>
                                                                <li><a href="#">Sunglasses</a></li>
                                                                <li><a href="#">Sport Wear</a></li>
                                                                <li><a href="#">Blazers</a></li>
                                                                <li><a href="#">Shirts</a></li>

                                                            </ul>
                                                        </div><!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Women</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Handbags</a></li>
                                                                <li><a href="#">Jwellery</a></li>
                                                                <li><a href="#">Swimwear </a></li>
                                                                <li><a href="#">Tops</a></li>
                                                                <li><a href="#">Flats</a></li>
                                                                <li><a href="#">Shoes</a></li>
                                                                <li><a href="#">Winter Wear</a></li>

                                                            </ul>
                                                        </div><!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Boys</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Toys & Games</a></li>
                                                                <li><a href="#">Jeans</a></li>
                                                                <li><a href="#">Shirts</a></li>
                                                                <li><a href="#">Shoes</a></li>
                                                                <li><a href="#">School Bags</a></li>
                                                                <li><a href="#">Lunch Box</a></li>
                                                                <li><a href="#">Footwear</a></li>

                                                            </ul>
                                                        </div><!-- /.col -->

                                                        <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                            <h2 class="title">Girls</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Sandals </a></li>
                                                                <li><a href="#">Shorts</a></li>
                                                                <li><a href="#">Dresses</a></li>
                                                                <li><a href="#">Jwellery</a></li>
                                                                <li><a href="#">Bags</a></li>
                                                                <li><a href="#">Night Dress</a></li>
                                                                <li><a href="#">Swim Wear</a></li>


                                                            </ul>
                                                        </div><!-- /.col -->


                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt="">


                                                        </div><!-- /.yamm-content -->
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>

                                    </li>

                                    <li class="dropdown mega-menu">
                                        <a href="category.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Electronics
                                            <span class="menu-label hot-menu hidden-xs">hot</span>
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                            <h2 class="title">Laptops</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Gaming</a></li>
                                                                <li><a href="#">Laptop Skins</a></li>
                                                                <li><a href="#">Apple</a></li>
                                                                <li><a href="#">Dell</a></li>
                                                                <li><a href="#">Lenovo</a></li>
                                                                <li><a href="#">Microsoft</a></li>
                                                                <li><a href="#">Asus</a></li>
                                                                <li><a href="#">Adapters</a></li>
                                                                <li><a href="#">Batteries</a></li>
                                                                <li><a href="#">Cooling Pads</a></li>
                                                            </ul>
                                                        </div><!-- /.col -->

                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                            <h2 class="title">Desktops</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Routers & Modems</a></li>
                                                                <li><a href="#">CPUs, Processors</a></li>
                                                                <li><a href="#">PC Gaming Store</a></li>
                                                                <li><a href="#">Graphics Cards</a></li>
                                                                <li><a href="#">Components</a></li>
                                                                <li><a href="#">Webcam</a></li>
                                                                <li><a href="#">Memory (RAM)</a></li>
                                                                <li><a href="#">Motherboards</a></li>
                                                                <li><a href="#">Keyboards</a></li>
                                                                <li><a href="#">Headphones</a></li>
                                                            </ul>
                                                        </div><!-- /.col -->

                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                            <h2 class="title">Cameras</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Accessories</a></li>
                                                                <li><a href="#">Binoculars</a></li>
                                                                <li><a href="#">Telescopes</a></li>
                                                                <li><a href="#">Camcorders</a></li>
                                                                <li><a href="#">Digital</a></li>
                                                                <li><a href="#">Film Cameras</a></li>
                                                                <li><a href="#">Flashes</a></li>
                                                                <li><a href="#">Lenses</a></li>
                                                                <li><a href="#">Surveillance</a></li>
                                                                <li><a href="#">Tripods</a></li>

                                                            </ul>
                                                        </div><!-- /.col -->
                                                        <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
                                                            <h2 class="title">Mobile Phones</h2>
                                                            <ul class="links">
                                                                <li><a href="#">Apple</a></li>
                                                                <li><a href="#">Samsung</a></li>
                                                                <li><a href="#">Lenovo</a></li>
                                                                <li><a href="#">Motorola</a></li>
                                                                <li><a href="#">LeEco</a></li>
                                                                <li><a href="#">Asus</a></li>
                                                                <li><a href="#">Acer</a></li>
                                                                <li><a href="#">Accessories</a></li>
                                                                <li><a href="#">Headphones</a></li>
                                                                <li><a href="#">Memory Cards</a></li>
                                                            </ul>
                                                        </div>

                                                        <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
                                                            <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a>
                                                        </div>
                                                    </div><!-- /.row -->
                                                </div><!-- /.yamm-content -->                    </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown hidden-sm">

                                        <a href="category.html">Health & Beauty
                                            <span class="menu-label new-menu hidden-xs">new</span>
                                        </a>
                                    </li>

                                    <li class="dropdown hidden-sm">
                                        <a href="category.html">Watches</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="contact.html">Jewellery</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="contact.html">Shoes</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="contact.html">Kids & Girls</a>
                                    </li>

                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                                        <ul class="dropdown-menu pages">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">

                                                        <div class="col-xs-12 col-menu">
                                                            <ul class="links">
                                                                <li><a href="home.html">Home</a></li>
                                                                <li><a href="category.html">Category</a></li>
                                                                <li><a href="detail.html">Detail</a></li>
                                                                <li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
                                                                <li><a href="checkout.html">Checkout</a></li>
                                                                <li><a href="blog.html">Blog</a></li>
                                                                <li><a href="blog-details.html">Blog Detail</a></li>
                                                                <li><a href="contact.html">Contact</a></li>
                                                                <li><a href="sign-in.html">Sign In</a></li>
                                                                <li><a href="my-wishlist.html">Wishlist</a></li>
                                                                <li><a href="terms-conditions.html">Terms and Condition</a></li>
                                                                <li><a href="track-orders.html">Track Orders</a></li>
                                                                <li><a href="product-comparison.html">Product-Comparison</a></li>
                                                                <li><a href="faq.html">FAQ</a></li>
                                                                <li><a href="404.html">404</a></li>

                                                            </ul>
                                                        </div>


                                                    </div>
                                                </div>
                                            </li>


                                        </ul>
                                    </li>
                                    <li class="dropdown  navbar-right special-menu">
                                        <a href="#">Todays offer</a>
                                    </li>


                                </ul><!-- /.navbar-nav -->
                                <div class="clearfix"></div>
                            </div><!-- /.nav-outer -->
                        </div><!-- /.navbar-collapse -->


                    </div><!-- /.nav-bg-class -->
                </div><!-- /.navbar-default -->
            </div><!-- /.container-class -->

        </div><!-- /.header-nav -->
        <!-- ============================================== NAVBAR : END ============================================== -->

    </header>

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class='active'>User Profile</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
   </div><!-- /.breadcrumb -->
@php
    $id = Auth::user()->id;
    $user = App\Models\User::find($id);
@endphp
 <!-- user dashboard design -->
 <div class="body-content">
     <div class="container">
        <div class="row">
            <div class="col-md-2">
                <img class="card-img-top" id="showImage" style="border-radius: 50%" src="{{ (!empty($user->profile_photo_path))? url('uploads/user_images/'.$user->profile_photo_path):url('uploads/no_image.jpg') }}" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
                    <a href="{{ route('change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div><!-- // end col-md-2 -->
            <div class="col-md-2">
            </div><!-- // end col-md-2 -->
            <div class="col-md-8">
               <div class="card">
                <h3 class="text-center"><span class="text-danger">Hi....</span><strong>{{ Auth::user()->name}}</strong> Update Your Profile</h3>
                   <div class="card-body">
                       <form method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span class="text-danger">**</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email <span class="text-danger">**</span></label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>


                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Phone <span class="text-danger">**</span></label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">User Image <span class="text-danger">**</span></label>
                            <input type="file" id="image" name="profile_photo_path" class="form-control">
                        </div>

                        <div class="form-group">            
                           <button type="submit" class="btn btn-danger">Update</button>
                        </div>         
                    </form>     
                   </div>
               </div> 
            </div><!-- // end col-md-8 -->
        </div> <!-- // end row -->
     </div>
 </div>
    <!-- ============================================================= FOOTER ============================================================= -->
   @include('includes.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->


    <!-- For demo purposes – can be removed on production -->


    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontEnd/asse\ts/js/jquery-1.11.1.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/bootstrap.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/bootstrap-hover-dropdown.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/owl.carousel.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/echo.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/jquery.easing-1.3.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/bootstrap-slider.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/jquery.rateit.min.js ') }}"></script> 
<script type="text/javascript" src="{{ asset('frontEnd/assets/js/lightbox.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/bootstrap-select.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/wow.min.js ') }}"></script> 
<script src="{{ asset('frontEnd/assets/js/scripts.js ') }}"></script>
<!-- sweetalert js -->
<script src="{{ asset('frontEnd/assets/sweetalert2@11.js ') }}"></script>
<!-- toastr js -->
<script type="text/javascript" src="{{ asset('frontEnd/toastr/toastr.min.js') }}"></script>
<!-- online link sweetalert js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jquery cdn -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- totastr section -->
  <script type="text/javascript">
      @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}");
      @endif
  </script>

    <script>
        $(document).ready(function () {
            $(".changecolor").switchstylesheet({ seperator: "color" });
            $('.show-theme-options').click(function () {
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function () {
            $('.show-theme-options').delay(2000).trigger('click');
        });
    </script>
    <!-- For demo purposes – can be removed on production : End -->

<!-- img change code -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
             $('#showImage').attr('src',e.target.result);   
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

</body>

</html>
