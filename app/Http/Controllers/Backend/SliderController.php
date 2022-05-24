<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Session;
use Image;

class SliderController extends Controller
{
	/*=================== Start Index Methoed ===================*/
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('BackEnd.slider.manage_slider',compact('sliders'));
    }

    /*=================== End Index Methoed ===================*/

    /*=================== Start Store Methoed ===================*/
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'slider_img' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'slider_img.required' => 'Plz Select One Image',
        ]);

        $image = $request->file('slider_img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
    	$save_url = 'uploads/slider/'.$name_gen;


        $slider = Slider::where('title',$request->title)->first();

        if($slider){
            Session::flash('warning','Slider already Created.');
            return redirect()->back(); 
        }else{
            $slider = Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,

        ]);

        Session::flash('success','Slider Image Inserted Successfully.');
        return redirect()->back();
        }
    }

    /*=================== End Store Methoed ===================*/

    /*=================== Start Edit Methoed ===================*/
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('BackEnd.slider.slider_edit')->with('slider',$slider);
    }

    /*=================== End Edit Methoed ===================*/

    /*=================== Start Update Methoed ===================*/
    public function update(Request $request)
    {

    	$this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

    	$slider_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('slider_img')) {

	    	unlink($old_img);
	    	$image = $request->file('slider_img');
	    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	    	Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
	    	$save_url = 'uploads/slider/'.$name_gen;

			Slider::findOrFail($slider_id)->update([
				'title' => $request->title,
				'description' => $request->description,
				'slider_img' => $save_url,

	    	]);


        	Session::flash('success','Slider Updated Successfully.');
        	return redirect()->route('slider.manage');

    	}else{

    		Slider::findOrFail($slider_id)->update([
				'title' => $request->title,
				'description' => $request->description,

	    	]);

	    	Session::flash('info','Slider Updated Without Image Successfully.');
        	return redirect()->route('slider.manage');


    	} // end else 

    } // end method

    /*=================== End Update Methoed ===================*/

    /*=================== End Delete Methoed ===================*/
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        Session::flash('info','Slider Image Parmanentlu Deleted Successfully.');
        return redirect()->back();
    }

    /*=================== End Delete Methoed ===================*/

    /*=================== Start Active/Inactive Methoed ===================*/
    public function active($id){
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->save();

        Session::flash('success','Successfully slider Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->save();

        Session::flash('success','Successfully slider Changed.');
    }

    /*=================== End Active/Inactive Methoed ===================*/
}
