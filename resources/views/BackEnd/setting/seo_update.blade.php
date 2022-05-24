@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
	<div class="container-full">
		<div class="content">
			<div class="row">
				<div class="col-12">
				  <div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Seo Setting:</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('update.seosetting') }}" method="post" class="form-horizontal form-element col-12" enctype="multipart/form-data">
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{ $seo->id }}">

							<div class="form-group">
								<h5>Meta Title <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" >
							 	</div>
							</div>
							
							<div class="form-group">
								<h5>Meta Author <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="meta_author" class="form-control"  value="{{ $seo->meta_author }}"  >
							 	</div>
							</div>

							<div class="form-group">
								<h5>Meta Keyword <span class="text-danger">*</span></h5>
								<div class="controls">
							 		<input type="text" name="meta_keyword" class="form-control" value="{{ $seo->meta_keyword }}"   >
							 	</div>
							</div>

							<div class="form-group">
								<h5>Meta Description <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="meta_description" id="textarea" class="form-control" required placeholder="Textarea text">
										{{ $seo->meta_description }}
									</textarea>     
							 	</div>
							</div>
							<div class="form-group">
								<h5>Google Analytics <span class="text-danger">*</span></h5>
								<div class="controls">
									<textarea name="google_analytics" id="textarea" class="form-control" required placeholder="Textarea text">
										{{ $seo->google_analytics }}
									</textarea>     
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