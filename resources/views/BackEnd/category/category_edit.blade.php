@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-10 m-auto">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Edit Category</h4>
				</div>
				<div class="box-body">
					<form action="{{ route('category.update',['id'=>$category->id]) }}" method="post" class="form-horizontal form-element col-12">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="name">Category Name: <span class="text-danger">**</span></label>
							@error('category_name')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<input type="text" name="category_name" class="form-control" id="name" placeholder="Enter the category name" value="{{ $category->category_name}}">
						</div>
						<div class="form-group">
							<label for="icon">Category Icon: <span class="text-danger">**</span></label>
							@error('category_icon')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<input type="text" name="category_icon" class="form-control" id="icon" placeholder="Enter the category icon" value="{{ $category->category_icon}}">
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