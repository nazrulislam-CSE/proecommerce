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
	<a href="{{ url('/') }}">
		
		<img src="{{ asset('FrontEnd/assets/images/logo.png ') }}" alt="">

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
      </div><!-- /.top-cart-row -->
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
				<li><a href="#">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 already-registered-login">
					<p class="text title-tag-line"><b>Shipping Address</b></p>

					<form class="register-form" role="form" action="{{ route('checkout.store') }}" method="POST">
						@csrf


						<div class="form-group">
						    <label class="info-title" for="exampleInputEmail1"><b>Shipping Name</b> <span>**</span></label>
						    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ Auth::user()->name }}" required>
					  	</div> <!-- // end form -->

					  	<div class="form-group">
						    <label class="info-title" for="exampleInputEmail1"><b>Email Name</b> <span>**</span></label>
						    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email Name" value="{{ Auth::user()->email }}" required>
					  	</div> <!-- // end form -->

					  	<div class="form-group">
						    <label class="info-title" for="exampleInputEmail1"><b>Phone</b> <span>**</span></label>
						    <input type="number" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}" required>
					  	</div> <!-- // end form -->

					  	<div class="form-group">
						    <label class="info-title" for="exampleInputEmail1"><b>Post Code</b> <span>**</span></label>
						    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required>
					  	</div> <!-- // end form -->
				</div>	
				<!-- guest-login -->

				<!-- already-registered-login -->
					<div class="col-md-6 col-sm-6 already-registered-login">


						<div class="form-group">
							<h5><b>Divsions Select</b><span class="text-danger">**</span></h5>
							@error('division_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<div class="controls">
								<select name="division_id" id="division_id" class="form-control">
									<option value="" selected disabled>Selected Division</option>
									@foreach($divisions as $division)
									<option value="{{ $division->id }}">{{ $division->division_name }}</option>
									@endforeach
								</select>
							</div>
						</div> <!-- // end form group // -->

						<div class="form-group">
							<h5><b>District Select</b><span class="text-danger">**</span></h5>
							@error('district_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<div class="controls">
								<select name="district_id" id="district_id" class="form-control">
									<option value="" selected disabled>Selected</option>

								</select>
							</div>
						</div> <!-- // end form group // -->

						<div class="form-group">
							<h5><b>State Select</b><span class="text-danger">**</span></h5>
							@error('state_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<div class="controls">
								<select name="state_id" id="state_id" class="form-control">
									<option value="" selected disabled>Selected</option>

								</select>
							</div>
						</div> <!-- // end form group // -->

						<div class="form-group">
							<label for="name"><b>Notes</b> <span class="text-danger">**</span></label><br>
							@error('notes')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<textarea name="notes" class="form-control" id="" cols="30" rows="5" placeholder="Notes"></textarea>
							
						</div> <!-- // end form group // -->

					</div>	
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">

					@foreach($carts as $item)
					<li>
						<strong>Image: </strong>
						<img src="{{ asset($item->options->image)}}" style="height: 50px; width: 50px;" alt="">
					</li>
					<li>
						<strong>Qty: </strong>
						( {{ $item->qty }} )

						<strong>Color: </strong>
						{{ $item->options->color }}

						<strong>Size: </strong>
						{{ $item->options->size }}
					</li>
					@endforeach
					<hr>
					<li>
						@if(Session::has('coupon'))

						<strong>SubTotal: </strong>${{ $cartTotal}} <hr>
						<strong>Coupon Name : </strong>${{ session()->get('coupon')['coupon_name'] }}
						( {{ session()->get('coupon')['coupon_discount'] }} % )
						<hr>

						<strong>Coupon Discount : </strong>${{ session()->get('coupon')['discount_amount'] }}
						<hr>
						<strong>Grand Total : </strong>${{ session()->get('coupon')['total_amount'] }}
						@else

						<strong>SubTotal: </strong>${{ $cartTotal}} <hr>
						<strong>Grand Total : </strong>${{ $cartTotal}} <hr>
						@endif
					</li>
				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar --></div>




<div class="col-md-4">
	<!-- checkout-progress-sidebar -->
	<div class="checkout-progress-sidebar ">
		<div class="panel-group">
			<div class="panel panel-default">
				<div class="panel-heading">
			    	<h4 class="unicase-checkout-title">Select Payment Method</h4>
			    </div>

			    <div class="row">
					<div class="col-md-4">
						<label for="">Stripe</label>
						<input type="radio" name="payment_method" value="stripe">
						<img src="{{ asset('FrontEnd/assets/images/payments/4.png') }}" alt="">
					</div> <!-- // end col-md-4 // -->
					<div class="col-md-4">
						<label for="">Card</label>
						<input type="radio" name="payment_method" value="card">
						<img src="{{ asset('FrontEnd/assets/images/payments/3.png') }}" alt="">
					</div> <!-- // end col-md-4 // -->
					<div class="col-md-4">
						<label for="">Cash</label>
						<input type="radio" name="payment_method" value="cash">
						<img src="{{ asset('FrontEnd/assets/images/payments/2.png') }}" alt="">
					</div> <!-- // end col-md-4 // -->

				</div> <!-- // end row // -->


				<hr>

				<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>

			</div>
		</div>
	</div> 
	<!-- checkout-progress-sidebar -->
</div> <!-- // end col-md-4 // -->

</form>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
<!-- ============================================================= FOOTER ============================================================= -->
@include('includes.footer')
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
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

<!-- jequery -->


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

<!-- jequery select with ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- division select with ajax -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            if(division_id) {
                $.ajax({
                    url: "{{  url('/division-get/ajax') }}/"+division_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="district_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<!-- district select with ajax -->
<script type="text/javascript">
      $(document).ready(function() {
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{  url('/district-view/state-view/ajax') }}/"+district_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="state_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
</body>

</html>
