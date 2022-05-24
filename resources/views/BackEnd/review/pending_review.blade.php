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
					  <h3 class="box-title">Pending All Reviews</h3>
					  <span class="badge badge-pill badge-danger">{{ count($review) }}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Summary  </th>
									<th>Comment </th>
									<th>User </th>
									<th>Product  </th>
									<th>Status </th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								 @foreach($review as $item)
							 <tr>
							 	<td>{{ $i++}}</td>
								<td> {{ $item->summary }}  </td>
								<td> {{ $item->comment }}  </td>
								<td>  {{ $item->user->name }}  </td>

								<td> {{ $item->product->product_name }}  </td>
								<td>
								@if($item->status == 0)
						      <span class="badge badge-pill badge-primary">Pending </span>
						       @elseif($item->status == 1)
						       <span class="badge badge-pill badge-success">Publish </span>
								@endif

								  </td>

								<td width="25%">
						  			<a href="{{ route('review.approve',$item->id)}}" class="btn btn-danger">Approve </a>
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