@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-10 m-auto">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Blog Category Edit</h4>
				</div>
				<div class="box-body">
					<form action="{{ route('blog.category.update',$blogcategory->id) }}" method="post" class="form-horizontal form-element col-12">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="name">Blog Category Name: <span class="text-danger">**</span></label><br>
							@error('blog_category_name')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<input type="text" name="blog_category_name" class="form-control" id="name" placeholder="Enter the blog category name" value="{{ $blogcategory->blog_category_name }}">
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<input type="submit" value="Update" class="btn btn-rounded btn-primary">
							</div>
						</div>
					</form>
				</div>	
			 </div>
			  <!-- /.box -->
			</div>
		</section>
	</div>
</div>
@endsection()