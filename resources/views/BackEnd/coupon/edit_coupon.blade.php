@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-10 m-auto">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Edit Coupon</h4>
				</div>
				<div class="box-body">
					<form action="{{ route('coupon.update',$coupons->id) }}" method="post" class="form-horizontal form-element col-12">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="name">Coupon Name: <span class="text-danger">**</span></label><br>
								@error('coupon_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="coupon_name" class="form-control" id="name" placeholder="Enter the coupon name" value="{{ $coupons->coupon_name }}">
							</div>

							<div class="form-group">
								<label for="discount">Coupon Discount(%) <span class="text-danger">**</span></label><br>
								@error('coupon_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="coupon_discount" class="form-control" id="discount" placeholder="Enter the coupon discount" value="{{ $coupons->coupon_discount }}">
							</div>

							<div class="form-group">
								<label for="validity_name">Coupon Validity Date: <span class="text-danger">**</span></label><br>
								@error('coupon_validity')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="date" name="coupon_validity" class="form-control" id="validity_name" placeholder="Enter the coupon date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupons->coupon_validity }}">
							</div>

							<div class="form-group row">
								<div class="col-sm-10">
									<input type="submit" value="Update" class="btn btn-rounded btn-primary">
								</div>
							</div>
						</form>
				</div>	
			 </div>
			  <!-- /.box -->
			</div>
		</section>
	</div>
</div>
@endsection()