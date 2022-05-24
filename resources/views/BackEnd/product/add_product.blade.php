@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('backEnd/jquery.min.js ') }}"></script>
<div class="content-wrapper">
	<div class="container-full">
		<!-- Main content -->
		<section class="content">
		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Product</h4>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
					  	<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-lg-4 col-md-6">
											<div class="form-group">
											<h5>Brand Select <span class="text-danger">*</span></h5>
											@error('brand_id')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<select name="brand_id" class="form-control"  >
													<option value="" selected="" disabled="">Select Brand</option>
													@foreach($brands as $brand)
													<option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>	
													@endforeach
												</select>
											 </div>
											</div>
									</div>
									<div class="col-lg-4 col-md-6">
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
									</div>
									<div class="col-lg-4 col-md-6">
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
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-6">
											<div class="form-group">
											<h5>SubSubCategory Select <span class="text-danger">*</span></h5>
											@error('subsubcategory_id')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<select name="subsubcategory_id" class="form-control"  >
													<option value="" selected="" disabled="">Select Category</option>
													
												</select>
											 </div>
											</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="product_name">Product Name: <span class="text-danger">*</span></label>
											@error('product_name')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter the product name">
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="product_code">Product Code: <span class="text-danger">*</span></label>
											@error('product_code')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="product_code" id="product_code" class="form-control" placeholder="Enter the product code">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="product_qty">Product Quantity: <span class="text-danger">*</span></label>
											@error('product_qty')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="product_qty" id="product_qty" class="form-control" placeholder="Enter the product quantity">
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="product_tags">Product Tags: <span class="text-danger">*</span></label>
											@error('product_tags')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="product_tags" id="product_tags" class="form-control" placeholder="Enter the product tags" value="Lorem,Ipsum,Amet" data-role="tagsinput">
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="product_size">Product Size: <span class="text-danger">*</span></label>
											@error('product_size')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="product_size" id="product_size" class="form-control" placeholder="Enter the product size"  value="Small,Middum,Large" data-role="tagsinput" id="product_size">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<h5>Product Color <span class="text-danger">*</span></h5>
											@error('product_color')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="product_color" class="form-control"  required="" value="Red,Yellow,Bule,White,Black,Green,Sky" data-role="tagsinput"  placeholder="Enter the product color">
											    @error('product_color') 
												<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
										</div>	
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="selling_price">Product Selling Price: <span class="text-danger">*</span></label>
											@error('selling_price')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="selling_price" id="selling_price" class="form-control" placeholder="Enter the product selling price">
											</div>
										</div>
									</div>
									<div class="col-lg-4 col-md-6">
										<div class="form-group">
											<label for="discount_price">Product Discount Price: <span class="text-danger">*</span></label>
											@error('discount_price')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="text" name="discount_price" id="discount_price" class="form-control" placeholder="Enter the product discount price">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="main_thambnail">Main Thambnail <span class="text-danger">*</span></label>
											@error('product_thambnail')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="file" name="product_thambnail" id="main_thambnail" class="form-control mb-2" onChange = "mainThamurl(this)">
											</div>
												<img src="" id="mainThmb" alt="">
										</div>
									</div>
									<div class="col-lg-6 col-md-6">
										<div class="form-group">
											<label for="multiImg">Multiple Image <span class="text-danger">*</span></label>
											@error('multi_img')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<input type="file" name="multi_img[]" id="multiImg" class="form-control" multiple="" id="multiImg"> 
												<div class="row pt-2" id="preview_img">
													
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="short_description">Short Description<span class="text-danger">*</span></label>
											@error('short_description')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<textarea id="short_description" name="short_description" class="form-control" rows="10" cols="30" placeholder="please some text here">
													
												</textarea>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="form-group">
											<label for="l_descrip">Long Description<span class="text-danger">*</span></label>
											@error('long_description')
												<span class="text-danger">{{ $message }}</span>
											@enderror()
											<div class="controls">
												<textarea id="l_descrip" name="long_description" class="form-control" rows="10" cols="30" placeholder="please some text here">
													
												</textarea>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">	 
											<div class="controls">
												<fieldset>
													<input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
													<label for="checkbox_2">Hot Deals</label>
													@error('hot_deals')
														<span class="text-danger">{{ $message }}</span>
													@enderror()
												</fieldset>
												<fieldset>
													<input type="checkbox" id="checkbox_3" name="featured" value="1">
													<label for="checkbox_3">Featured</label>
													@error('featured')
														<span class="text-danger">{{ $message }}</span>
													@enderror()
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div class="controls">
												<fieldset>
													<input type="checkbox" id="checkbox_4" name="special_offer" value="1">
													<label for="checkbox_4">Special Offer</label>
													@error('special_offer')
														<span class="text-danger">{{ $message }}</span>
													@enderror()
												</fieldset>
												<fieldset>
													<input type="checkbox" id="checkbox_5" name="special_deals" value="1">
													<label for="checkbox_5">Special Deals</label>
													@error('special_deals')
														<span class="text-danger">{{ $message }}</span>
													@enderror()
												</fieldset>
											</div>
												</div>
											</div>
									</div>
									<div class="text-xs-right">
									<input type="submit" value="Add Product" class="btn btn-rounded btn-primary">
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
<!-- sub category -->
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
  <!-- sub-sub category -->
  <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="subcategory_id"]').on('change', function(){
            var subcategory_id = $(this).val();
            if(subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory-subsubcategory/ajax') }}/"+subcategory_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subsubcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name + '</option>');
                          });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
  </script>

  <!-- product main thumnail -->
  <script type="text/javascript">
  	function mainThamurl(input){
  		if(input.files && input.files[0]){
  			var reader = new FileReader();
  			reader.onload = function(e){
  				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
  			};
  			reader.readAsDataURL(input.files[0]);
  		}
  	}
  </script>

<!-- show multimg javascript code -->
<script>
 
  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
   
</script>

@endsection()