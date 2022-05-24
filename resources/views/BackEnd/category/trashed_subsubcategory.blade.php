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
					  <h3 class="box-title">Trashed Sub->SubCategory list:</h3>
					  <a href="{{ route('subsubcategory.all') }}" class="btn btn-danger">Go Back To Sub->SubCategory List</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>SubSubCategory Name</th>
									<th>Category Id</th>
									<th>SubCategory Id</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($subsubcategory as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $item->subsubcategory_name }}</td>
									<td>{{ $item->category_id }}</td>
									<td>{{ $item->subcategory_id }}</td>
									<td>{{ $item->status }}</td>
									<td>
										<a href="{{ route('subsubcategory.restore',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('subsubcategory.kill',$item->id) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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