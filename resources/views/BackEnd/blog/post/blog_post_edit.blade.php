@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-12">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Blog Post Edit</h4>
				</div>
				<div class="box-body">
				<form action="{{ route('blog.post.update',$blogpost->id) }}" method="post" enctype="multipart/form-data">
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
												<input type="text" name="post_title" id="post_title" class="form-control" placeholder="Enter the post title" value="{{ $blogpost->post_title }}">
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
												<option value="{{ $category->id }}" {{ $category->id == $blogpost->blog_category_id  ? "selected":"" }}>{{ $category->blog_category_name }}</option>	
												@endforeach
											</select>
										 </div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="form-group">
											<label class="form-control-label" for="brand_image">Post Image: <span class="text-danger">**</span></label>
					                    @error('brand_image')
					                    	<span class="text-danger">{{ $message }}</span>
					                   	@enderror()
					                    <div class="container">
					                        <div class="row">
					                          <div class="col-md-12">
						                            <img id="brand_showImage" src="{{ asset($blogpost->post_image)}}" class="user_img" alt="" style="width: 50px; height: 50px;">
						                            <div class="custom-file">
						                                <input type="file" name="post_image"class="form-control-file border mt-3 mb-3" id="brand_image">
						                            </div>
						                    </div>
						                </div>
						            </div>
											</div>
											<div class="col-lg-12 col-md-12">
												<div class="form-group">
													<label for="editor2">Post Details<span class="text-danger">**</span></label>
													@error('post_details')
														<span class="text-danger">{{ $message }}</span>
													@enderror()
													<div class="controls">
														<textarea name="post_details" id="editor1" class="form-control" required placeholder="please some text here">{{ $blogpost->post_details }}</textarea>
													</div>
												</div>	
											</div>
											<div class="text-xs-right">
												<input type="submit" value="Update" class="btn btn-rounded btn-primary">
											</div>
										</div>
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