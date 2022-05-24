<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use Image;
use Session;

class BrandController extends Controller
{
	/*=================== Start Index Methoed ===================*/
    public function Index(){
    	$brand = Brand::latest()->get();
        return view('BackEnd.brand.brand_view')->with('brands',$brand);
    }

    /*=================== End Index Methoed ===================*/

    /*=================== Start Store Methoed ===================*/
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name' => 'required',
            'brand_image' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->brand_name));

        $image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(45,28)->save('uploads/brand/'.$name_gen);
    	$save_url = 'uploads/brand/'.$name_gen;

        // start brand image//
        // $brand= $request->brand_image;
        // $brand_new_name = time().$brand->getClientOriginalName();
        // $brand->move('uploads/brand',$brand_new_name);
        // end brand image //

        $brand = Brand::where('brand_name',$request->brand_name)->first();

        if($brand){
            Session::flash('warning','Brand already Created.');
            return redirect()->back(); 
        }else{
            Brand::insert([
			'brand_name' => $request->brand_name,
			'brand_slug'=>$slug_title,
			'brand_image' => $save_url,
            'created_at' => Carbon::now(),

	    	]);

        Session::flash('success','Brand Created Successfully.');
        return redirect()->back();
        }
    }
    /*=================== End Store Methoed ===================*/

    /*=================== Start Edit Methoed ===================*/
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('BackEnd.brand.brand_edit')->with('brand',$brand);
    }
    /*=================== End Edit Methoed ===================*/

    /*=================== Start Update Methoed ===================*/
    public function update(Request $request, $id)
    {

    	$brand_id = $request->id;
    	$old_img = $request->old_image;

    	$slug_title  = strtolower(str_replace(' ', '-', $request->brand_name));

    	if ($request->file('brand_image')) {

    	unlink($old_img);
    	$image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(45,28)->save('uploads/brand/'.$name_gen);
    	$save_url = 'uploads/brand/'.$name_gen;

	Brand::findOrFail($brand_id)->update([
		'brand_name' => $request->brand_name,
		'brand_slug' => $slug_title,
		'brand_image' => $save_url,
        'created_at' => Carbon::now(),

    	]);

	    Session::flash('success','Brand Updated Successfully.');
        return redirect()->route('brand.all');

    	}else{

    	Brand::findOrFail($brand_id)->update([
		'brand_name' => $request->brand_name,
		'brand_slug' => $slug_title,

    	]);

	    Session::flash('success','Brand Updated Successfully.');
        return redirect()->route('brand.all');
		
    	} // end else 

    }
    /*=================== End Update Methoed ===================*/

    /*=================== Start Destroy Methoed ===================*/
    public function destroy($id)
    {
        $brand = Brand::find($id);
        unlink($brand->brand_image);
        $brand->delete();

        Session::flash('info','Brand Permanently Deleted Successfully.');
        return redirect()->back();
    }

    /*=================== End Destroy Methoed ===================*/

    /*=================== Start Active/Inactive Methoed ===================*/
    public function active($id){
        $brand = Brand::find($id);
        $brand->status = 1;
        $brand->save();

        Session::flash('success','Successfully Brand Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $brand = Brand::find($id);
        $brand->status = 0;
        $brand->save();

        Session::flash('success','Successfully Brand Changed.');
        return redirect()->back();
    }

    /* =================== End Active/Inactive Methoed =================== */

}
