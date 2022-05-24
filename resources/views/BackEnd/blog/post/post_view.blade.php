@extends('admin.admin_master')
@section('admin')
<script src="{{ asset('backEnd/jquery.min.js ') }}"></script>
<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add View Post</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('blog.post.store') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
					  	<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="post_title">Post Title: <span class="text-danger">**</span></label>
											@error('post_title')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="post_title" id="post_title" class="form-control" placeholder="Enter the post title">
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
										<h5>Blog Category Select <span class="text-danger">**</span></h5>
										@error('blog_category_id')
											<span class="text-danger">{{ $message }}</span>
										@enderror()
										<div class="controls">
											<select name="blog_category_id" class="form-control"  >
												<option value="" selected="" disabled="">Select Category</option>
												@foreach($blogcategory as $category)
												<option value="{{ $category->id }}">{{ $category->blog_category_name }}</option>	
												@endforeach
											</select>
										 </div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label for="post_image">Post Main Image <span class="text-danger">**</span></label>
											@error('post_image')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="file" name="post_image" id="post_image" class="form-control mb-2" onChange = "mainThamurl(this)">
											</div>
												<img src="" id="postmainThmb" alt="">
										</div>
									</div>
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label for="editor2">Post Details<span class="text-danger">**</span></label>
											@error('post_details')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<textarea name="post_details" id="editor1" class="form-control" required placeholder="please some text here"></textarea>
											</div>
										</div>	
									</div>
									<div class="text-xs-right">
										<input type="submit" value="Add Post" class="btn btn-rounded btn-primary">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->
		</section>
		<!-- /.content -->
	</div>
</div>
 
  <!-- product main thumnail -->
  <script type="text/javascript">
  	function mainThamurl(input){
  		if(input.files && input.files[0]){
  			var reader = new FileReader();
  			reader.onload = function(e){
  				$('#postmainThmb').attr('src',e.target.result).width(80).height(80);
  			};
  			reader.readAsDataURL(input.files[0]);
  		}
  	}
  </script>

@endsection()