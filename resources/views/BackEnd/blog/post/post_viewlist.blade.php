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
					  <h3 class="box-title">Blog Post list:</h3>
					  <span class="badge badge-pill badge-danger">{{ count($blogpost) }}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Post Image</th>
									<th>Post Title</th>
									<th>Post Slug</th>
									<th>Post Details</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($blogpost as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td><img src="{{ asset($item->post_image) }}" width="60" height="60" alt=""></td>
									<td width="15%">
										<?php $des =  strip_tags(html_entity_decode($item->post_title))?>
                    {{ Str::limit($des, $limit = 20, $end = '. . .') }}
									</td>
									<td width="15%">
										<?php $des =  strip_tags(html_entity_decode($item->post_slug))?>
                    {{ Str::limit($des, $limit = 20, $end = '. . .') }}
									</td>
									<td width="15%">
										<?php $des =  strip_tags(html_entity_decode($item->post_details))?>
                    {{ Str::limit($des, $limit = 20, $end = '. . .') }}
									</td>
									<td>
										@if($item->status == 1)
                    	<a href="{{ route('blog.post.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
                    @else
                    	<a href="{{ route('blog.post.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
                    @endif
									</td>
									<td width="30%">
										<a href="{{ route('blog.post.edit',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('blog.post.delete',$item->id) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
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