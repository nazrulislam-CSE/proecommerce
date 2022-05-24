@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
	<div class="container-full">
		<div class="content">
			<div class="row">
				<div class="col-12">
				  <div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Admin Change Password</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('update.password') }}" method="post" class="form-horizontal form-element col-12">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="password">Old Password <span class="text-danger">**</span></label>
								@error('old_password')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="password" name="old_password" class="form-control" id="password" placeholder="Enter the old password">
							</div>
							<div class="form-group">
								<label for="new">New Password <span class="text-danger">**</span></label>
								@error('new_password')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="password" name="new_password" class="form-control" id="new" placeholder="Enter the new password">
							</div>
							<div class="form-group">
								<label for="confirm">Confirm Password <span class="text-danger">**</span></label>
								@error('confirm_password')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="password" name="confirm_password" class="form-control" id="confirm" placeholder="Enter the confirm password">
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