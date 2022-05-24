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
					  <h3 class="box-title">Brand list:</h3>
					  <span class="badge badge-pill badge-danger">{{ DB::table('brands')->count() }}</span>
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
									<td><img src="{{ asset($item->brand_image) }}" width="60" height="60" alt=""></td>
									<td>{{ $item->brand_name }}</td>
									<td>
										@if($item->status == 1)
                    	<a href="{{ route('brand.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
                    @else
                    	<a href="{{ route('brand.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                    @endif
									</td>
									<td>
										<a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('brand.trash',['id'=>$item->id]) }}" id="trash" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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
					  <h4 class="box-title">Add Brand</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('brand.store') }}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="password">Brand Name<span class="text-danger">**</span></label><br>
								@error('brand_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="brand_name" class="form-control" id="password" placeholder="Enter the brnad name">
							</div>
							<div class="form-group">
									<label class="form-control-label" for="brand_image">Brand Image: <span class="text-danger">**</span></label><br>
				                    @error('brand_image')
				                    	<span class="text-danger">{{ $message }}</span>
				                   	@enderror()
				                    <div class="container">
				                        <div class="row">
				                          <div class="col-md-12">
					                            <img id="brand_showImage" src="{{ asset('uploads/default-50x50.png')}}" class="user_img" alt="" style="width: 50px; height: 50px;">
					                            <div class="custom-file">
					                                <input type="file" name="brand_image"class="form-control-file border mt-3 mb-3" id="brand_image">
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