@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-md-12">
				<div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Edit Admin User</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('admin.update',$adminuser->id) }}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
							{{ csrf_field() }}

								<!-- <input type="hidden" name="id" value="{{ $adminuser->id }}">	 -->
	 							<input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path }}">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>Admin User Name  <span class="text-danger">*</span></h5>
										@error('name')
											<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="controls">
									 		<input type="text" name="name" class="form-control" value="{{ $adminuser->name }}">
									 	</div>
									</div>
								</div> <!-- end cold md 6 -->

								<div class="col-md-6">
								  <div class="form-group">
										<h5>Admin Email  <span class="text-danger">*</span></h5>
										@error('email')
											<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="controls">
								 				<input type="email" name="email" class="form-control" value="{{ $adminuser->email }}">
								 			</div>
								 		</div>
								</div> <!-- end cold md 6 --> 
							</div>	<!-- end row 	 -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>Admin User Phone  <span class="text-danger">*</span></h5>
										@error('phone')
											<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="controls">
									 		<input type="text" name="phone" class="form-control" value="{{ $adminuser->phone }}">
									 	</div>
									</div>
								</div>
							</div><!-- end row 	 -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<h5>Admin User Image <span class="text-danger">*</span></h5>
										@error('profile_photo_path')
											<span class="text-danger">{{ $message }}</span>
										@enderror
										<div class="controls">
								 			<input type="file" name="profile_photo_path" class="form-control" id="image">
								 		</div>
									</div>
								</div>
								<div class="col-md-6">
									<img id="showImage" src="{{ asset($adminuser->profile_photo_path) }}" required="" style="width: 100px; height: 100px;">
								</div>
							</div><!-- end row 	 -->
							<hr>
							<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<div class="controls">
											<fieldset>
												<input type="checkbox" id="checkbox_2" name="brand" value="1" {{ $adminuser->brand == 1 ? 'checked' : '' }} >
												<label for="checkbox_2">Brand</label>
											</fieldset>
											<fieldset>
												<input type="checkbox" id="checkbox_3" name="category" value="1" {{ $adminuser->category == 1 ? 'checked' : '' }} >
												<label for="checkbox_3">Category</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_4" name="product" value="1" {{ $adminuser->product == 1 ? 'checked' : '' }} >
												<label for="checkbox_4">Product</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_5" name="slider" value="1" {{ $adminuser->slider == 1 ? 'checked' : '' }} >
												<label for="checkbox_5">Slider</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_6" name="coupons" value="1" {{ $adminuser->coupons == 1 ? 'checked' : '' }} >
												<label for="checkbox_6">Coupons</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_16" name="adminuserrole" value="1" {{ $adminuser->adminuserrole == 1 ? 'checked' : '' }} > 
												<label for="checkbox_16">Adminuserrole</label>
											</fieldset>
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">	 
										<div class="controls">
											<fieldset>
												<input type="checkbox" id="checkbox_7" name="shipping" value="1" {{ $adminuser->shipping == 1 ? 'checked' : '' }} >
												<label for="checkbox_7">Shipping</label>
											</fieldset>
											<fieldset>
												<input type="checkbox" id="checkbox_8" name="blog" value="1" {{ $adminuser->blog == 1 ? 'checked' : '' }} >
												<label for="checkbox_8">Blog</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_9" name="setting" value="1" {{ $adminuser->setting == 1 ? 'checked' : '' }} >
												<label for="checkbox_9">Setting</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_11" name="review" value="1" {{ $adminuser->review == 1 ? 'checked' : '' }} >
												<label for="checkbox_11">	Review</label>
											</fieldset>

											<fieldset>
												<input type="checkbox" id="checkbox_15" name="alluser" value="1" {{ $adminuser->alluser == 1 ? 'checked' : '' }}>
												<label for="checkbox_15">Alluser</label>
											</fieldset>
										</div>
									</div>
								</div>
							</div><!-- end row 	 -->
							<div class="form-group row">
								<div class="col-sm-10">
									<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
								</div>
							</div>
						</form>
					</div>
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


 <script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);	
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
  <!-- /.content-wrapper -->
@endsection()