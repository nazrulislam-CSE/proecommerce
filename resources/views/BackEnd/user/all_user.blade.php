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
					  <h3 class="box-title">User list:</h3>
					  <span class="badge badge-pill badge-danger">{{ count($users) }}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Image</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($users as $user)
								<tr>
									<td>{{ $i++ }}</td>
									<td><img src="{{ (!empty($user->profile_photo_path))? url('uploads/user_images/'.$user->profile_photo_path):url('uploads/no_image.jpg') }}" alt="" style="width:50px; height: 50px;"></td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->phone }}</td>

									<td>
										@if($user->UserOnline())
								         <span class="badge badge-pill badge-success">Active Now</span>
										@else
								            <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
										@endif 
									</td>
									<td>
										<a href="#" class="btn btn-info" ><i class="fa fa-edit"></i></a>
										<a href="#" id="trash" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection()