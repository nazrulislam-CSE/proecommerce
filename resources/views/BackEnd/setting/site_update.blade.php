@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<div class="content">
			<div class="row">
				<div class="col-12">
				  <div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Site Setting:</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('update.sitesetting') }}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{ $setting->id }}">

							 <div class="form-group">
								<h5>Site Logo  <span class="text-danger"> </span></h5>
								<div class="controls">
							 		<input type="file" name="logo" class="form-control" >
								</div>
							</div>
							<div class="form-group">
								<h5>Phone One <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="phone_one" class="form-control" value="{{ $setting->phone_one }}" >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Phone Two <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="phone_two" class="form-control" value="{{ $setting->phone_two }}" >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Email <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="email" name="email" class="form-control" value="{{ $setting->email }}"   >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Company Name <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="company_name" class="form-control" value="{{ $setting->company_name }}"   >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Company Address <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="company_address" class="form-control" value="{{ $setting->company_address }}"   >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Facebook <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="facebook" class="form-control" value="{{ $setting->facebook }}"   >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Twitter <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="twitter" class="form-control"  value="{{ $setting->twitter }}"  >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Linkedin <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="linkedin" class="form-control"  value="{{ $setting->linkedin }}"  >
							 	</div>
							</div>
							<div class="form-group">
								<h5>Youtube <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="youtube" class="form-control"  value="{{ $setting->youtube }}"  >
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
		</div>
	</div>
</div>
@endsection()