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
					  <h3 class="box-title">Slider list:</h3>
					  <span class="badge badge-pill badge-danger">{{ DB::table('sliders')->count() }}</span>
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
									<td>
										@if($item->title == Null)
										<span class="badge badge-pill badge-danger">No Title</span>
										@else
											{{ $item->title }}
										@endif
									</td>
									<td>{{ $item->description }}</td>
									<td>
										@if($item->status == 1)
                    	<a href="{{ route('slider.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
                    @else
                    	<a href="{{ route('slider.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                    @endif
									</td>
									<td>
										<a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('slider.trash',$item->id) }}" id="trash" class="btn btn-danger btn-rounded mt-2"><i class="fa fa-trash"></i></a>
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
					  <h4 class="box-title">Add Slider</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('slider.store') }}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="title">Slider Title: <span class="text-danger">**</span></label><br>
								@error('title')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="title" class="form-control" id="title" placeholder="Enter the slider title">
							</div>
							<div class="form-group">
								<label for="description">Slider Description: <span class="text-danger">**</span></label><br>
								@error('description')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="description" class="form-control" id="description" placeholder="Enter the slider description">
							</div>
							<div class="form-group">
									<label class="form-control-label" for="slider_image">Slider Image: <span class="text-danger">**</span></label><br>
				                    @error('slider_img')
				                    	<span class="text-danger">{{ $message }}</span>
				                   	@enderror()
				                    <div class="container">
				                        <div class="row">
				                          <div class="col-md-12">
					                            <img id="slider_showImage" src="{{ asset('uploads/default-50x50.png')}}" class="user_img" alt="" style="width: 50px; height: 50px;">
					                            <div class="custom-file">
					                                <input type="file" name="slider_img"class="form-control-file border mt-3 mb-3" id="slider_image">
					                            </div>
					                    </div>
					                </div>
				               </div>
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