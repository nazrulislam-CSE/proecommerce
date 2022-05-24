@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-10 m-auto">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Edit Brand</h4>
				</div>
				<div class="box-body">
					<form action="{{ route('brand.update',['id'=>$brand->id]) }}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
							{{ csrf_field() }}
							
							<input type="hidden" name="id" value="{{ $brand->id }}">	
							<input type="hidden" name="old_image" value="{{ $brand->brand_image }}">			   

							<div class="form-group">
								<label for="password">Brand Name: <span class="text-danger">**</span></label>
								@error('brand_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control" id="password" placeholder="Enter the brnad name">
							</div>
							<div class="form-group">
								<label class="form-control-label" for="brand_image">Brand Image: <span class="text-danger">**</span></label>
			                    @error('brand_image')
			                    	<span class="text-danger">{{ $message }}</span>
			                   	@enderror()
			                    <div class="container">
			                        <div class="row">
			                          <div class="col-md-12">
				                            <img id="brand_showImage" src="{{ asset($brand->brand_image)}}" class="user_img" alt="" style="width: 50px; height: 50px;">
				                            <div class="custom-file">
				                                <input type="file" name="brand_image"class="form-control-file border mt-3 mb-3" id="brand_image">
				                            </div>
				                    </div>
				                </div>
				            </div>
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