@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
  <div class="container-full">
    <section class="content ">
      <div class="row">
      <div class="col-md-10 m-auto">
        <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit SubCategory</h4>
        </div>
        <div class="box-body">
          <form action="{{ route('subcategory.update',['id'=>$subcategories->id]) }}" method="post" class="form-horizontal form-element col-12">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="name">SubCategory Name: <span class="text-danger">**</span></label>
              @error('subcategory_name')
                <span class="text-danger">{{ $message }}</span>
              @enderror()
              <input type="text" name="subcategory_name" class="form-control" id="name" placeholder="Enter the category name" value="{{ $subcategories->subcategory_name}}">
            </div>
            <div class="form-group">
              <h5>Category Select <span class="text-danger">*</span></h5>
              @error('category_id')
                <span class="text-danger">{{ $message }}</span>
              @enderror()
              <div class="controls">
                <select name="category_id" class="form-control"  >
                  <option value="" selected="" disabled="">Select Category</option>
                  @foreach($category as $category)
                  <<option value="{{ $category->id }}"
                    {{ $category->id == $subcategories->category_id ? "selected":"" }}>{{ $category->category_name }}</option>  
                  @endforeach
                </select>
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