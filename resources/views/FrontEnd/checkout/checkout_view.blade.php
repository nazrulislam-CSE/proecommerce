@extends('frontend.main_master')
@section('content')

@section('title')
My Checkout
@endsection

<!-- jequery select with ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('frontend/assets/jquery.min.js ') }}"></script>

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb --> 


<!-- Start checkout body part section -->
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

												<strong>SubTotal: </strong>৳{{ $cartTotal}} <hr>
												<strong>Coupon Name : </strong>৳{{ session()->get('coupon')['coupon_name'] }}
												( {{ session()->get('coupon')['coupon_discount'] }} % )
												<hr>

												<strong>Coupon Discount : </strong>৳{{ session()->get('coupon')['discount_amount'] }}
												<hr>
												<strong>Grand Total : </strong>৳{{ session()->get('coupon')['total_amount'] }}
											
											@else

												<strong>SubTotal: </strong>৳{{ $cartTotal}} <hr>
												<strong>Grand Total : </strong>৳{{ $cartTotal}} <hr>
											@endif
										</li>

									</ul>		
								</div>
							</div>
						</div>
					</div> 
					<!-- checkout-progress-sidebar -->
				</div>




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
										<label for="">Nagad</label>
										<input type="radio" name="payment_method" value="stripe">
										<img src="{{ asset('FrontEnd/assets/nogod.png') }}" alt="">
									</div> <!-- // end col-md-4 // -->
									<div class="col-md-4">
										<label for="">Bikash</label>
										<input type="radio" name="payment_method" value="bikash">
										<img src="{{ asset('FrontEnd/assets/bikash.png') }}" alt="">
									</div> <!-- // end col-md-4 // -->
									<div class="col-md-4">
										<label for="">Cash</label>
										<input type="radio" name="payment_method" value="cash">
										<img src="{{ asset('FrontEnd/assets/6.png') }}" alt="">
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
</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- End checkout body part section -->


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
                       $('select[name="state_id"]').empty();
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
@endsection 