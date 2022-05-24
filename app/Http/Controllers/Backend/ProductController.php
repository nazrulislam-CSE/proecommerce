<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
use Carbon\Carbon;
use Session;
use Image;

class ProductController extends Controller
{
	/*=================== Start Index Methoed ===================*/
    public function index()
    {
        $brand = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('BackEnd.product.add_product')
                                    ->with('brands',$brand)
                                    ->with('categories',$category)
                                    ->with('subcategories',$subcategory)
                                    ->with('subsubcategories',$subsubcategory);
    }

    /*=================== End Index Methoed ===================*/

    /*=================== Start Manage Methoed ===================*/
    public function manageProduct(){
        $products = Product::all(); 
        return view('BackEnd.product.manage_product')->with('products',$products);
    }

    /*=================== Start Manage Methoed ===================*/

   	/*=================== Start Store Methoed ===================*/
    public function store(Request $request){

    	$this->validate($request,[
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'selling_price' => 'required',
            'discount_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'product_thambnail' => 'required',
            
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->product_name));

        /*=================== Start Product Single Image Upload ===================*/
        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
    	$save_url = 'uploads/products/thambnail/'.$name_gen;
    	/*=================== End Product Single Image Upload ===================*/

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => $slug_title,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'created_at' => Carbon::now(), 
        ]);

       	/*=================== Start MultiImage Upload ===================*/
        $images = $request->file('multi_img');
      	foreach ($images as $img) {
	      	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
	    	Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
	    	$uploadPath = 'uploads/products/multi-image/'.$make_name;

	    	MultiImg::insert([

	    		'product_id' => $product_id,
	    		'photo_name' => $uploadPath,
	    		'created_at' => Carbon::now(), 

	    	]);
	    }
	    /*=================== End MultiImage Upload ===================*/

	    Session::flash('success','Product Inserted Successfully.');
        return redirect()->back();
    }

    /*=================== End Store Methoed ===================*/

    /*=================== Start Product Edit Methoed ===================*/
    public function editProduct($id)
    {
        $products = Product::findOrfail($id);

        /*=========== Product Multiimg Select ============*/
        $multImgs = MultiImg::where('product_id',$id)->get();
        
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = SubSubcategory::latest()->get();

        return view('BackEnd.product.product_edit',compact('products','brands','categories','subcategory','subsubcategory','multImgs'));
    }
    /*=================== Start Product Edit Methoed ===================*/

    /*===================  Start Product Just Data Update ===================*/
    public function ProductDataUpdate(Request $request){

        $this->validate($request,[
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_id' => 'required',
            'product_name' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_tags' => 'required',
            
            'product_color' => 'required',
            'selling_price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required'
        ]);

        /*================= Product Slug ================*/
        $slug_title  = strtolower(str_replace(' ', '-', $request->product_name));

        /*================= Product Select Request Er Input Field  ================*/
        $product_id = $request->id;

        $product_id = Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => $slug_title,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals
        ]);

        Session::flash('success','Product Updated Without Image Successfully.');
        return redirect()->route('product.manage');
    }
    /*=================== End Product Just  Data Update ===================*/

    /*===================  Start Multiple Image Update ===================*/
    public function MultiImageUpdate(Request $request){
		$imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
		    $imgDel = MultiImg::findOrFail($id);
		    unlink($imgDel->photo_name);
		     
	    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
	    	Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
	    	$uploadPath = 'uploads/products/multi-image/'.$make_name;

	    	MultiImg::where('id',$id)->update([
	    		'photo_name' => $uploadPath,
	    		'updated_at' => Carbon::now(),

	    	]);
	    }

    	Session::flash('info','Product Multi Image Updated  Successfully.');
        return redirect()->back();

	} // end foreach
 	/*===================  End Multiple Image Update   ===================*/

 	/*=================== Start Product Main Thambnail Update ===================*/
 	public function ThambnailImageUpdate(Request $request){
	 	$pro_id = $request->id;
	 	$oldImage = $request->old_img;
	 	unlink($oldImage);

    	$image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
    	$save_url = 'uploads/products/thambnail/'.$name_gen;

    	Product::findOrFail($pro_id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

    	Session::flash('info','Product Image Thambnail Updated Successfully');
		return redirect()->back();

    } // end method
 	/*=================== End Product Main Thambnail Update   ===================*/

 	/*=================== Start Multi Image Delete ===================*/
 	public function MultiImageDelete($id){
     	$oldimg = MultiImg::findOrFail($id);
     	unlink($oldimg->photo_name);
     	MultiImg::findOrFail($id)->delete();

     	
     	Session::flash('success','Product Multi Image  Deleted  Successfully.');
        return redirect()->back();

     } // end method 
 	/*=================== End Multi Image Delete   ===================*/

 	/*=================== Start Destroy Methoed ===================*/
 	public function destroy($id)
    {
    	$product = Product::findOrFail($id);
        Product::findOrFail($id)->delete();

        Session::flash('info','Product All Data Parmanently Deleted  Successfully.');
        return redirect()->back();
    }
 	/*=================== Start Destroy Methoed ===================*/

    /*=================== Start Active/Inactive Methoed ===================*/
    public function active($id){
        $product = Product::find($id);
        $product->status = 1;
        $product->save();

        Session::flash('success','Successfully product Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $product = Product::find($id);
        $product->status = 0;
        $product->save();

        Session::flash('success','Successfully product Changed.');
        return redirect()->back();
    }
    /*=================== End Active/Inactive Methoed ===================*/
}

