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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

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
					<li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
					<li>
                      @auth
                       <a href="{{ route('login') }}"><i class="icon fa fa-user"></i>User Profile</a>
                      @else
                       <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a>
                      @endauth
                    </li>
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
	<a href="{{ route('index') }}">
		
		<img src="{{ asset('frontEnd/assets/images/logo.png ') }}" alt="">

	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form>
        <div class="control-group">

            <ul class="categories-filter animate-dropdown">
                <li class="dropdown">

                    <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

                    <ul class="dropdown-menu" role="menu" >
                        <li class="menu-header">Computer</li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>

                    </ul>
                </li>
            </ul>

            <input class="search-field" placeholder="Search here..." />

            <a class="search-button" href="#" ></a>    

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          
          <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count">
                <span class="count" id="cartQty"></span>
              </div>
              <div class="total-price-basket">
                <span class="lbl">cart -</span>
                <span class="total-price"> <span class="sign">$</span>
                <span class="value" id="cartSubTotal"></span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">
              <li>


                <!-- Mini Cart Start With Ajax -->
                <div id="miniCart">
                  
                </div>
                <!-- Mini Cart End With Ajax -->

                <div class="clearfix cart-total">
                  <div class="pull-right">
                    <span class="text">Sub Total :</span>
                    <span class='price' id="cartSubTotal"></span> </div>
                  <div class="clearfix"></div>
                  <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a> </div>
                <!-- /.cart-total--> 
                
              </li>
            </ul>
            <!-- /.dropdown-menu--> 
          </div>
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
      </div>
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
            <img class="img-responsive" src="{{ asset('frontEnd/assets/images/banners/top-menu-banner.jpg ') }}" alt="">
                              
                            
      
   
       
 
</div><!-- /.yamm-content -->					
</div>
</div>

</li>
				</ul>
				
			</li>

			<li class="dropdown mega-menu">
				<a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Electronics
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
</div><!-- /.yamm-content -->					</li>
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
				<li><a href="home.html">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row ">
            <div class="shopping-cart">
                <div class="shopping-cart-table ">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="cart-romove item">Image</th>
                    <th class="cart-product-name item">Name</th>
                    <th class="cart-product-name item">Color</th>
                    <th class="cart-product-name item">Size</th>
                    <th class="cart-qty item">Quantity</th>
                    <th class="cart-sub-total item">Subtotal</th>
                    <th class="cart-total last-item">Remove</th>
                </tr>
            </thead><!-- /thead -->
			<tbody id="cartPage">
				
			</tbody>
		</table>
	</div>
</div>
<!-- start coupon aria -->
<div class="col-md-4 col-sm-12 estimate-ship-tax">
    
</div>

<div class="col-md-4 col-sm-12 estimate-ship-tax">

    @if(Session::has('coupon'))

    @else


    <table class="table" id="couponField">
        <thead>
            <tr>
                <th>
                    <span class="estimate-title">Discount Code</span>
                    <p>Enter your coupon code if you have one..</p>
                </th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
                        </div>
                        <div class="clearfix pull-right">
                            <button type="submit" class="btn-upper btn btn-primary" onclick="applyCoupon()">APPLY COUPON</button>
                        </div>
                    </td>
                </tr>
        </tbody><!-- /tbody -->
    </table><!-- /table -->

    @endif
</div><!-- /.estimate-ship-tax -->

<div class="col-md-4 col-sm-12 cart-shopping-total">
    <table class="table">
        <thead id="couponCalField">
            
        </thead><!-- /thead -->
        <tbody>
                <tr>
                    <td>
                        <div class="cart-checkout-btn pull-right">
                            <a type="submit" href="{{ route('checkout') }}" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>
                        </div>
                    </td>
                </tr>
        </tbody><!-- /tbody -->
    </table><!-- /table -->
</div><!-- /.cart-shopping-total -->
<!-- end coupon aria -->




</div><!-- /.row -->
</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">

		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand3.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand6.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand2.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand4.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand1.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item">
					<a href="#" class="image">
						<img data-echo="assets/images/brands/brand5.png" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
	
</div><!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
@include('includes.footer')
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('frontEnd/assets/js/jquery-1.11.1.min.js ') }}"></script> 
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
<!-- <script src="{{ asset('frontEnd/assets/sweetalert2@11.js ') }}"></script> -->
 <!-- toastr js -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- online link sweetalert js -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Start Add To Cart Product Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong id="pname"></strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModel">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 200px;" id="pimage">
            </div>
          </div> <!-- // end col-md-4 -->
          <div class="col-md-4">
             <ul class="list-group">
              <li class="list-group-item">
                Product Price: <strong class="text-danger">$<span id="pprice"></span></strong>
              <del id="oldprice">$</del>
              </li>
              <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
              <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
              <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>
              <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background: green; color: white;"></span> 
              <span class="badge badge-pill badge-danger" id="stockout" style="background: red; color: white;"></span> 

              </li>
            </ul>
          </div><!-- // end col-md-4 -->
          <div class="col-md-4">
            <div class="form-group">
              <label for="color">Choose Color</label>
              <select class="form-control" id="color" name="color">
                
                
              </select>
            </div>  <!-- // end form group -->
            <div class="form-group" id="sizeArea">
              <label for="size">Choose Size</label>
              <select class="form-control" id="size" name="size">
                
                 
              </select>
            </div>  <!-- // end form group -->
            <div class="form-group">
              <label for="qty">Quantity</label>
              <input type="number" class="form-control" id="qty" value="1" min="1" >
            </div> <!-- // end form group -->

              <input type="hidden" id="product_id">
              <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add to Cart</button>
          </div><!-- // end col-md-4 -->
        </div>
      </div> <!-- // end modal body -->
    </div>
  </div>
</div>
<!-- End Add To Cart Product Modal -->
<script type="text/javascript">
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

// Start Product View With Modal

function productView(id){
  // alert(id)
  $.ajax({
    type:'GET',
    url:'/product/view/modal/'+id,
    dataType:'json',
    success:function(data){
      // console.log(data)
      $('#pname').text(data.product.product_name);
      $('#pprice').text(data.product.selling_price);
      $('#pcode').text(data.product.product_code);
      $('#pcategory').text(data.product.category.category_name);
      $('#pbrand').text(data.product.brand.brand_name);
      $('#pname').text(data.product.product_name);
      $('#pimage').attr('src','/'+data.product.product_thambnail);

      // add to cart product id //
      $('#product_id').val(id);
      // add to cart qty id //
      $('#qty').val(1);

      // product-price-javascript
      if(data.product.discount_price == null){
        $('#pprice').text('');
        $('#oldprice').text('');
        $('#pprice').text(data.product.selling_price);

      }else{
        $('#pprice').text(data.product.selling_price);
        $('#oldprice').text(data.product.selling_price);
      } // end product price

      // Start Stock option
      if(data.product.product_qty > 0){
        $('#aviable').text('');
        $('#stockout').text('');
        $('#aviable').text('aviable');
      }else{
        $('#aviable').text('');
        $('#stockout').text('');
        $('#stockout').text('stockout');
      }




      // Color
      $('select[name="color"]').empty();
      $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value=" '+value+' ">'+value+'</option>')
      }) // end color

      // size
      $('select[name="size"]').empty();
      $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value=" '+value+' ">'+value+'</option>')

        if(data.size == ""){
          $('#sizeArea').hide();
        }else{
          $('#sizeArea').show();
        }

      }) // end size


    }


  })

}
// End Product View With Modal

// Start Add To Cart  With Product

function addToCart(){
  var product_name = $('#pname').text();
  var id = $('#product_id').val();
  var color = $('#color option:selected').text(); 
  var size = $('#size option:selected').text();
  var quantity = $('#qty').val();
  $.ajax({
    type:"POST",
    dataType:'json',
    data:{
      color:color,size:size,quantity:quantity,product_name:product_name
    },
    url:"/cart/data/store/"+id,
    success:function(data){
      miniCart()
      $('#closeModel').click();
      // console.log(data)

      // Start Sweertaleart Message
      const Toast = Swal.mixin({
            toast:true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
          })

      if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          title: data.success
        })
      }else{
        Toast.fire({
          type:'error',
          title: data.error
        })
      }
      // End Sweertaleart Message
    }
  })
}
// End Add To Cart  With Product
</script>
<script type="text/javascript">
  function miniCart(){
    $.ajax({
      type: 'GET',
      url: '/product/mini/cart',
      dataType:'json',
      success:function(response){
        $('span[id="cartSubTotal"]').text(response.cartTotal);
        $('#cartQty').text(response.cartQty);
        var miniCart = ""

        $.each(response.carts, function(key,value){
          miniCart += ` <div class="cart-item product-summary">
                  <div class="row">
                    <div class="col-xs-4">
                      <div class="image"> <a href="detail.html"><img src="/${value.options.image}" alt=""></a> </div>
                    </div>
                    <div class="col-xs-7">
                      <h3 class="name"><a href="index8a95.html?page-detail">${value.name}</a></h3>
                      <div class="price">${value.price} * ${value.qty}</div>
                    </div>
                    <div class="col-xs-1 action">
                    <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button>
                    </div>
                  </div>
                </div>
                <!-- /.cart-item -->
                <div class="clearfix"></div>
                <hr>`
        });

        $('#miniCart').html(miniCart);
        // console.log(response)
      }
    })
  }
  miniCart();

/// mini cart remove Start 
/// end mini cart remove  
function miniCartRemove(rowId){
  $.ajax({
    type:'GET',
    url: '/minicart/product-remove/' +rowId,
    dataType:'json',
    success:function(data){
      miniCart();
      
      // Start Message 
      const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 3000
          })
      if ($.isEmptyObject(data.error)) {
          Toast.fire({
              type: 'success',
              title: data.success
          })
      }else{
          Toast.fire({
              type: 'error',
              title: data.error
          })
      }
      // End Message
    }

  })
}

</script>
	<!-- For demo purposes – can be removed on production -->
	
	<script src="{{ asset('switchstylesheet/switchstylesheet.html ') }}"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	<!-- /// Load My Cart /// -->

<script type="text/javascript">
     function cart(){
        $.ajax({
            type: 'GET',
            url: '/user/get-cart-product',
            dataType:'json',
            success:function(response){
    var rows = ""
    $.each(response.carts, function(key,value){
        rows += `<tr>
        <td class="col-md-2"><img src="/${value.options.image} " alt="imga" style="width:60px; height:60px;"></td>
        
        <td class="col-md-2">
            <div class="product-name"><a href="#">${value.name}</a></div>
             
            <div class="price"> 
                            ${value.price}
                        </div>
                    </td>
          <td class="col-md-2">
            <strong>${value.options.color} </strong> 
            </td>
         <td class="col-md-2">
          ${value.options.size == null
            ? `<span> .... </span>`
            :
          `<strong>${value.options.size} </strong>` 
          }           
            </td>
           <td class="col-md-2">

           ${value.qty > 1

            ? `<button type="submit" class="btn btn-danger btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button>`

            : ` <button type="submit" class="btn btn-danger btn-sm" disabled >-</button> `

           }

            <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  

            <button type="submit" class="btn btn-success btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>
         
            </td>
             <td class="col-md-2">
            <strong>$${value.subtotal} </strong> 
            </td>
         
        <td class="col-md-1 close-btn">
            <button type="submit" class="" id="${value.rowId}" onclick="cartRemove(this.id)"><i class="fa fa-times"></i></button>
        </td>
                </tr>`
        });
                
                $('#cartPage').html(rows);
            }
        })
     }
 cart();


 ///   Cart remove Start 
    function cartRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/cart-remove/'+id,
            dataType:'json',
            success:function(data){
            couponCalculation();
            cart();
            miniCart();

            $('#couponField').show();
            $('#coupon_name').val('');

                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        });
    }
 // End Cart remove   
 // -------- CART INCREMENT --------//
    function cartIncrement(rowId){
        $.ajax({
            type:'GET',
            url: "/user/cart-increment/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
 // -------- CART Decrement  --------//
    function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/user/cart-decrement/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                cart();
                miniCart();
            }
        });
    }
 // ---------- END CART Decrement -----///
 
 </script>  

<!-- //End Load My cart / -->

<!-- //================= Start Coupon Apply Start ===============// -->
<script type="text/javascript">
    function applyCoupon(){

        var coupon_name = $('#coupon_name').val();
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{coupon_name:coupon_name},
            url:"{{ url('/coupon-apply') }}",
            success:function(data){

                couponCalculation();
                $('#couponField').hide();

                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 
            }
        })
    }

// coupon calculation //
function couponCalculation(){
$.ajax({
    type:'GET',
    url:"{{ url('/coupon-calculation') }}",
    dataType:'json',
    success:function(data){

        if(data.total){

            $('#couponCalField').html(
                `<tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$${data.total}</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$${data.total}</span>
                        </div>
                    </th>
                </tr>`
                )
        }else{
            $('#couponCalField').html(
                `<tr>
                    <th>
                        <div class="cart-sub-total">
                            Subtotal<span class="inner-left-md">$${data.subtotal}</span>
                        </div>
                        <div class="cart-sub-total">
                            Coupon<span class="inner-left-md">${data.coupon_name}</span>
                            <button type="submit" onclick="couponRemove()"> <i class="fa fa-times"></i></button>
                        </div>
                        <div class="cart-sub-total">
                            Discount Amount<span class="inner-left-md">$${data.discount_amount}</span>
                        </div>
                        <div class="cart-grand-total">
                            Grand Total<span class="inner-left-md">$${data.total_amount}</span>
                        </div>
                    </th>
                </tr>`
                )
        } //end else
    }
});


}
couponCalculation();

</script>
<!-- //================= End Coupon Apply Start ===============// -->


<!-- //================= Start Coupon Remove ===============// -->
<script type="text/javascript">

    function couponRemove(){
        $.ajax({
            type:'GET',
            url:"{{ url('/coupon-remove') }}",
            dataType:'json',
            success:function(data){

                $('#couponField').show();
                $('#coupon_name').val('');

                couponCalculation();

                // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      
                      showConfirmButton: false,
                      timer: 3000
                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error
                    })
                }
                // End Message 

               
            }
        })
    }
</script>
<!-- //================= End Coupon Remove ===============// -->

</body>

</html>
