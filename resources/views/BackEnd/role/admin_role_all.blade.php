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
					  <h3 class="box-title">Total Admin User</h3>
					  <span class="badge badge-pill badge-danger">{{ count($adminuser)}}</span>
					  <a href="{{ route('add.admin') }}" class="btn btn-danger" style="float: right;">Add Admin User</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Image  </th>
									<th>Name </th>
									<th>Email </th>
									<th>Access  </th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								 @foreach($adminuser as $item)
							 <tr>
							 	<td>{{ $i++}}</td>
								<td><img src="{{ asset($item->profile_photo_path)}}" style="width: 50px; height: 50px;"></td>
								<td> {{ $item->name }}  </td>
								<td>  {{ $item->email }}  </td>
								<td width="34%" class="p-2">
									@if($item->brand == 1)
									<span class="badge btn-primary">Brand</span>
									@else
									@endif

									@if($item->category == 1)
									<span class="badge btn-secondary">Category</span>
									@else
									@endif


									@if($item->product == 1)
									<span class="badge btn-success">Product</span>
									@else
									@endif


									@if($item->slider == 1)
									<span class="badge btn-danger">Slider</span>
									@else
									@endif


									@if($item->coupons == 1)
									<span class="badge btn-warning">Coupons</span>
									@else
									@endif


									@if($item->shipping == 1)
									<span class="badge btn-info">Shipping</span>
									@else
									@endif


									@if($item->blog == 1)
									<span class="badge btn-warning">Blog</span>
									@else
									@endif


									@if($item->setting == 1)
									<span class="badge btn-dark mt-2">Setting</span>
									@else
									@endif


									@if($item->review == 1)
									<span class="badge btn-danger mt-2">Review</span>
									@else
									@endif


									@if($item->alluser == 1)
									<span class="badge btn-info mt-2">Alluser</span>
									@else
									@endif

									@if($item->adminuserrole == 1)
									<span class="badge btn-dark mt-2">Adminuserrole</span>
									@else
									@endif
						 

								</td>
								<td width="25%">
						  		<a href="{{ route('edit.admin.user',$item->id) }}" class="btn btn-danger">Edit </a>
						  		<a href="#" class="btn btn-primary">Delete </a>
								</td>
													 
							 </tr>
							  @endforeach
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