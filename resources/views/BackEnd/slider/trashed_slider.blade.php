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
					  <h3 class="box-title">Trashed Slider list:</h3>
					  <a href="{{ route('manage.slider') }}" class="btn btn-danger">Go Back To Slider List</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Slider Image</th>
									<th>Slider Title</th>
									<th>Slider Description</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($sliders as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td><img src="{{ asset($item->slider_img) }}" width="60" height="60" alt=""></td>
									<td>{{ $item->title }}</td>
									<td>{{ $item->description }}</td>
									<td>{{ $item->status }}</td>
									<td>
										<a href="{{ route('slider.restore',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('slider.kill',$item->id) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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