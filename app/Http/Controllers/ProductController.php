<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    // manage product //
    public function manageProduct(){
        $products = Product::all();
        return view('BackEnd.product.product_view')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'hot_deals' => 'required',
            'featured' => 'required',
            'special_offer' => 'required',
            'special_deals' => 'required'
        ]);


        $slug_title  = strtolower(str_replace(' ', '-', $request->product_name));

        // start product meain thambnail image//
        $product= $request->product_thambnail;
        $product_new_name = time().$product->getClientOriginalName();
        $product->move('uploads/product/thambnail/',$product_new_name);
        // end product meain thambnail image //


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
            'product_thambnail' => 'uploads/product/thambnail/'.$product_new_name,
        ]);

            ////////// Multiple Image Upload Start ///////////

                  $images = $request->file('multi_img');
                  foreach ($images as $img) {
                    $multi_new_name = time().$img->getClientOriginalName();
                    $img->move('uploads/product/multi-image/',$multi_new_name);

                    $multiimg = MultiImg::create([
                        'product_id' => $product_id,
                        'photo_name' => 'uploads/product/multi-image/'.$multi_new_name,

                    ]);

                  }

            ////////// Multiple Image Upload End ///////////


        Session::flash('success','Product Inserted Successfully.');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        $products = Product::findOrfail($id);

        // product multiimg select //
        $multImgs = MultiImg::where('product_id',$id)->get();
        
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = Subcategory::latest()->get();
        $subsubcategory = SubSubcategory::latest()->get();

        return view('BackEnd.product.product_edit',compact('products','brands','categories','subcategory','subsubcategory','multImgs'));
    }

    // start product just data update //

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

        // product slug //
        $slug_title  = strtolower(str_replace(' ', '-', $request->product_name));

        // product slect request er input field  //
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

    // end product just data update //

    // start just multipul update //
    public function MultiImageUpdate(Request $request){

        $imgs = $request->multi_img;

        foreach ( $imgs as $id =>$img ){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            // start product meain thambnail image//
            $multiimg_new_name = time().$img->getClientOriginalName();
            $img->move('uploads/product/multi-image/',$multiimg_new_name);
            // end product meain thambnail image //

            MultiImg::where('id',$id)->update([
                'photo_name' => 'uploads/product/multi-image/'.$multiimg_new_name
            ]);
        } // end foreach

        Session::flash('info','Product Multi Image Updated  Successfully.');
        return redirect()->back();
    }
    // end just multipul  update //

    // start product thambnail update imgae //
    public function ThambnailImageUpdate(Request $request){

        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        // start product meain thambnail image//
        $product= $request->product_thambnail;
        $product_new_name = time().$product->getClientOriginalName();
        $product->move('uploads/product/thambnail/',$product_new_name);
        // end product meain thambnail image //

        Product::findOrFail($pro_id)->update([
                'product_thambnail' => 'uploads/product/thambnail/'.$product_new_name
            ]);

        Session::flash('info','Product Thambnail Image Updated  Successfully.');
        return redirect()->back();
    }
    // end product thambnail update imgae //

    // start product multIimg delete section //
    public function MultiImageDelete($id){

        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);

        MultiImg::findOrFail($id)->delete();

        Session::flash('success','Product Multi Image  Deleted  Successfully.');
        return redirect()->back();

    }
    // end product multIimg delete section //

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Product::findOrFail($id)->delete();

        Session::flash('info','Product All Data Moved To Trashed Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $product = Product::onlyTrashed()->get();
        return view('BackEnd.product.trashed_product')->with('products',$product);
    }

    public function restore($id){
        $product = Product::withTrashed()->where('id',$id)->first();
        $product->restore();

        Session::flash('success','Product Restore Successfully.');
        return redirect()->back();
    }

    public function kill($id){
        $product = Product::withTrashed()->where('id',$id)->first();
        // product thambnail //
        unlink($product->product_thambnail);
        $product->forceDelete();

        $images = MultiImg::where('product_id',$id)->get();

        foreach ($images as $img){
            // product multiImg // 
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        Session::flash('success','Product All Data Parmanently Deleted  Successfully.');
        return redirect()->back();
    }

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
}
