@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-md-8">
				<div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Coupon list:</h3>
					  <span class="badge badge-pill badge-danger">{{ DB::table('coupons')->count() }}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Coupon Name</th>
									<th>Coupon Discount</th>
									<th>Coupon Validity</th>
									<th>Valid</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($coupons as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $item->coupon_name }}</td>
									<td>{{ $item->coupon_discount }}%</td>
									<td width="40%">
										{{ Carbon\Carbon::parse($item->coupon_validity)->format('D,d F Y')}}
									</td>
									<td>
										@if($item->coupon_validity  >= Carbon\Carbon::now()->format('Y-m-d'))
                    	<a href="#" class="badge badge-pill badge-success">Valid</a>
                    @else
                    	<a href="#" class="badge badge-pill badge-danger">Invalid</a>
                    @endif
									</td>
									<td>
										@if($item->status == 1)
                    	<a href="{{ route('coupon.in_active',['id'=>$item->id]) }}" class="btn btn-info btn-sm">Active</a>
                    @else
                    	<a href="{{ route('coupon.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                    @endif
									</td>
									<td width="100%">
										<a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('coupon.delete', $item->id) }}" id="delete" class="btn btn-danger btn-rounded mt-2"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach()
							</tbody>
						  </table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				  <!-- /.box -->
				  <!-- /.box -->          
			</div>
			<div class="col-md-4">
				<div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Add Coupon</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('coupon.store') }}" method="post" class="form-horizontal form-element col-12">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="name">Coupon Name: <span class="text-danger">**</span></label><br>
								@error('coupon_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="coupon_name" class="form-control" id="name" placeholder="Enter the coupon name">
							</div>

							<div class="form-group">
								<label for="discount">Coupon Discount(%) <span class="text-danger">**</span></label><br>
								@error('coupon_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="coupon_discount" class="form-control" id="discount" placeholder="Enter the coupon discount">
							</div>

							<div class="form-group">
								<label for="coupon_validity">Coupon Validity Date: <span class="text-danger">**</span></label><br>
								@error('coupon_validity')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="date" name="coupon_validity" class="form-control" id="validity_name" placeholder="Enter the coupon date" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
							</div>

							<div class="form-group row">
								<div class="col-sm-10">
									<input type="submit" value="Add New" class="btn btn-rounded btn-primary">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection()