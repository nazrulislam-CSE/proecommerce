<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('BackEnd.slider.manage_slider',compact('sliders'));
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
            'title' => 'required',
            'description' => 'required',
            'slider_img' => 'required|mimes:jpg,jpeg,png,gif',
        ],[
            'slider_img.required' => 'Plz Select One Image',
        ]);

        // start brand image//
        $slider= $request->slider_img;
        $slider_new_name = time().$slider->getClientOriginalName();
        $slider->move('uploads/slider',$slider_new_name);
        // end brand image //

        $slider = Slider::where('title',$request->title)->first();

        if($slider){
            Session::flash('warning','Slider already Created.');
            return redirect()->back(); 
        }else{
            $slider = Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => 'uploads/slider/'.$slider_new_name,
        ]);

        Session::flash('success','Slider Image Inserted Successfully.');
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
        $slider = Slider::find($id);
        return view('BackEnd.slider.slider_edit')->with('slider',$slider);
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
        $slider_update = Slider::find($id);

        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);


        // start slider image //
        if($request->hasfile('slider_img')){
            $slider= $request->slider_img;
            $slider_new_name = time().$slider->getClientOriginalName();
            $slider->move('uploads/slider',$slider_new_name);
            $slider_update->slider_img = 'uploads/slider/'.$slider_new_name;
        }
        // end slider image //

        $slider_update->title = $request->title;
        $slider_update->description = $request->description;
        // dd($request->all());
        $slider_update->save();

        Session::flash('success','Slider Image Updated Successfully.');
        return redirect()->route('manage.slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();

        Session::flash('info','Slider Image Moved To Trashed Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $slider = Slider::onlyTrashed()->get();
        return view('BackEnd.slider.trashed_slider')->with('sliders',$slider);
    }

    public function restore($id){
        $slider = Slider::withTrashed()->where('id',$id)->first();
        $slider->restore();

        Session::flash('success','Slider Restore Successfully.');
        return redirect()->back();
    }

    public function kill($id){

        $slider = Slider::withTrashed()->where('id',$id)->first();
        
        unlink($slider->slider_img);
        $slider->forceDelete();

        Session::flash('info','slider All data Parmanently Deleted Successfully.');
        return redirect()->back();
    }

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
        return redirect()->back();
    }
}
