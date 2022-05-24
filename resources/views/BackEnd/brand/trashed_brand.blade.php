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
					<div class="box-header with-border d-flex justify-content-between">
					  <h3 class="box-title">Trashed Brand list:</h3>
					  <a href="{{ route('brand.all') }}" class="btn btn-danger">Go Back To Brand List</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Brand Image</th>
									<th>Brand Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($brands as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td><img src="{{ asset($item->brand_image) }}" width="50" height="50" alt=""></td>
									<td>{{ $item->brand_name }}</td>
									<td>
										@if($item->status == 1)
                    	<a href="{{ route('brand.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
                    @else
                    	<a href="{{ route('brand.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                    @endif
									</td>
									<td>
										<a href="{{ route('brand.restore',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('brand.kill',$item->id) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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