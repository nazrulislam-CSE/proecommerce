@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-10 m-auto">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Edit Slider</h4>
				</div>
				<div class="box-body">
					<form action="{{ route('slider.update',$slider->id)}}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="title">Slider Title: <span class="text-danger">**</span></label><br>
							@error('title')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<input type="text" name="title" value="{{ $slider->title }}" class="form-control" id="title" placeholder="Enter the slider title">
						</div>
						<div class="form-group">
							<label for="description">Slider Description: <span class="text-danger">**</span></label><br>
							@error('description')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<input type="text" name="description" value="{{ $slider->description }}" class="form-control" id="description" placeholder="Enter the slider description">
						</div>
						<div class="form-group">
							<label class="form-control-label" for="slider_image">Slider Image: <span class="text-danger">**</span></label><br>
		                    @error('slider_img')
		                    	<span class="text-danger">{{ $message }}</span>
		                   	@enderror()
		                    <div class="container">
		                        <div class="row">
		                          <div class="col-md-12">
			                            <img id="slider_showImage" src="{{ asset($slider->slider_img) }}" class="user_img" alt="" style="width: 50px; height: 50px;">
			                            <div class="custom-file">
			                                <input type="file" name="slider_img"class="form-control-file border mt-3 mb-3" id="slider_image">
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
			  <!-- /.box -->
			</div>
		</section>
	</div>
</div>
@endsection()