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
					  <h3 class="box-title">Blog Category list:</h3>
					  <span class="badge badge-pill badge-danger">{{ count($blogcategory )}}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Blog Category Name</th>
									<th>Blog Category Slug</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($blogcategory as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $item->blog_category_name }}</td>
									<td>{{ $item->blog_category_slug }}</td>
									<td>
										@if($item->status == 1)
					                    	<a href="{{ route('blog.category.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
					                    @else
					                    	<a href="{{ route('blog.category.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
					                    @endif
									</td>
									<td width="30%">
										<a href="{{ route('blog.category.edit',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('blog.category.delete',$item->id) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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
					  <h4 class="box-title">Add Blog Category</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('blog.category.store') }}" method="post" class="form-horizontal form-element col-12">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="name">Blog Category Name: <span class="text-danger">**</span></label><br>
								@error('blog_category_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="blog_category_name" class="form-control" id="name" placeholder="Enter the blog category name">
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