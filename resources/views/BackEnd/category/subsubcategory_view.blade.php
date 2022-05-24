@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('backEnd/jquery.min.js ') }}"></script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
		  	<div class="col-md-8">
				<div class="box">
					<div class="box-header with-border">
					  <h3 class="box-title">Chield Category list:</h3>
					   <span class="badge badge-pill badge-danger">{{ DB::table('sub_sub_categories')->count() }}</span>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
						  <table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Sl No</th>
									<th>Chield Category Name</th>
									<th>Category Name</th>
									<th>SubCategory Name</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@php
									$i = 1;
								@endphp
								@foreach($subsubcategories as $item)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $item->subsubcategory_name }}</td>
									<td>{{ $item->category->category_name }}</td>
									<td>{{ $item->subcategory->subcategory_name }}</td>
									<td>
										@if($item->status == 1)
					                    	<a href="{{ route('subsubcategory.in_active',['id'=>$item->id]) }}" class="btn btn-success btn-sm">Active</a>
					                    @else
					                    	<a href="{{ route('subsubcategory.active',['id'=>$item->id]) }}" class="btn btn-danger btn-sm">Inactive</a>
					                    @endif
									</td>
									<td>
										<a href="{{ route('subsubcategory.edit',$item->id) }}" class="btn btn-info btn-rounded" ><i class="fa fa-edit"></i></a>
										<a href="{{ route('subsubcategory.delete',['id'=>$item->id]) }}" id="delete" class="btn btn-danger btn-rounded"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								@endforeach()
							</tbody>
						  </table>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				  <!-- /.box -->
				  <!-- /.box -->          
			</div>
			<div class="col-md-4">
				<div class="box">
					<div class="box-header with-border">
					  <h4 class="box-title">Add Chield Category</h4>
					</div>
					<div class="box-body">
						<form action="{{ route('subsubcategory.store') }}" method="post" class="form-horizontal form-element col-12">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="name">ChieldCategory Name: <span class="text-danger">**</span></label><br>
								@error('subsubcategory_name')
									<span class="text-danger">{{ $message }}</span>
								@enderror()
								<input type="text" name="subsubcategory_name" class="form-control" id="name" placeholder="Enter the category name">
							</div>

							<div class="form-group">
							<h5>Category Select <span class="text-danger">*</span></h5>
							@error('category_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<div class="controls">
								<select name="category_id" class="form-control"  >
									<option value="" selected="" disabled="">Select Category</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->category_name }}</option>	
									@endforeach
								</select>
							 </div>
							</div>
							<div class="form-group">
							<h5>SubCategory Select <span class="text-danger">*</span></h5>
							@error('subcategory_id')
								<span class="text-danger">{{ $message }}</span>
							@enderror()
							<div class="controls">
								<select name="subcategory_id" class="form-control"  >
									<option value="" selected="" disabled="">Select Category</option>

								</select>
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
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/category/category-subcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
  </script>

@endsection()