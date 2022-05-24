<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::latest()->get();
        return view('BackEnd.brand.brand_view')->with('brands',$brand);
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
            'brand_name' => 'required',
            'brand_image' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->brand_name));

        // start brand image//
        $brand= $request->brand_image;
        $brand_new_name = time().$brand->getClientOriginalName();
        $brand->move('uploads/brand',$brand_new_name);
        // end brand image //

        $brand = Brand::where('brand_name',$request->brand_name)->first();

        if($brand){
            Session::flash('warning','Brand already Created.');
            return redirect()->back(); 
        }else{
            $brand = Brand::create([
            'brand_name' => $request->brand_name,
            'brand_slug'=>$slug_title,
            'brand_image' => 'uploads/brand/'.$brand_new_name,
        ]);

        Session::flash('success','Brand Created Successfully.');
        return redirect()->back();
        }
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
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('BackEnd.brand.brand_edit')->with('brand',$brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand_update = Brand::find($id);

        $this->validate($request,[
            'brand_name' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->brand_name));

        // start brand image //
        if($request->hasfile('brand_image')){
            $brand= $request->brand_image;
            $brand_new_name = time().$brand->getClientOriginalName();
            $brand->move('uploads/brand',$brand_new_name);
            $brand_update->brand_image = 'uploads/brand/'.$brand_new_name;
        }
        // end brand image //

        $brand_update->brand_name = $request->brand_name;
        $brand_update->brand_slug = $slug_title;
        // dd($request->all());
        $brand_update->save();

        Session::flash('success','Brand Updated Successfully.');
        return redirect()->route('brand.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();

        Session::flash('info','Brand Moved To Trashed Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $brand = Brand::onlyTrashed()->get();
        return view('BackEnd.brand.trashed_brand')->with('brands',$brand);
    }

    public function restore($id){
        $brand = Brand::withTrashed()->where('id',$id)->first();
        $brand->restore();

        Session::flash('success','Brand Restore Successfully.');
        return redirect()->back();
    }

    public function kill($id){
        
        $brand = Brand::withTrashed()->where('id',$id)->first();
        
        $brand->forceDelete();

        Session::flash('info','Brand Parmanently Deleted Successfully.');
        return redirect()->back();
    }

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
}
