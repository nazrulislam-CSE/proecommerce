@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<section class="content ">
			<div class="row">
			<div class="col-md-10 m-auto">
			  <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">Edit District</h4>
				</div>
				<div class="box-body">
					<form action="{{ route('district.update',$districts->id) }}" method="post" class="form-horizontal form-element col-12">
						{{ csrf_field() }}
						<div class="form-group">
							<h5>Divsions Select<span class="text-danger">**</span></h5>
							@error('division_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<div class="controls">
								<select name="division_id" id="division_id" class="form-control">
									<option value="" selected disabled>Selected</option>
									@foreach($divisions as $division)
									<option value="{{ $division->id }}" {{ $division->id == $districts->division_id  ? "selected":"" }}>{{ $division->division_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="name">District Name: <span class="text-danger">**</span></label><br>
							@error('district_name')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<input type="text" name="district_name" class="form-control" id="name" placeholder="Enter the district name" value="{{ $districts->district_name }}">
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