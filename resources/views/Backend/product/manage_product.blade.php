@extends('admin.admin_master')
@section('admin')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Product list:</h3>
					  <span class="badge badge-pill badge-danger">{{ DB::table('products')->count() }}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Product Image</th>
									<th>Product Name</th>
									<th>Product Price</th>
									<th>Product Category</th>
									<th>Quantity</th>
									<th>Discount</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($products as $products)
								<tr>
									<td>{{ $i++ }}</td>
									<td><img src="{{ asset($products->product_thambnail)}}" width="50" height="50" alt=""></td>
									<td>{{ $products->product_name }}</td>
									<td>{{ $products->selling_price }} $</td>
									<td>{{ $products->category->category_name }}</td>
									<td>{{ $products->product_qty }} Pic</td>
									<td> 
									 	@if($products->discount_price == NULL)

									 	<span class="badge badge-pill badge-danger">No Discount</span>

										 	@else
										 	@php
										 	$amount = $products->selling_price - $products->discount_price;
										 	$discount = ($amount/$products->selling_price) * 100;
										 	@endphp
								   		<span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>
										 	@endif

									 </td>
									<td>
										@if($products->status == 1)
					                    	<a href="{{ route('product.in_active',['id'=>$products->id]) }}" class="btn btn-success btn-sm">Active</a>
					                    @else
					                    	<a href="{{ route('product.active',['id'=>$products->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
					                    @endif
									</td>
									<td>
										<a href="{{ route('product.edit',['id'=>$products->id])}}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('product.delete',$products->id) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection()