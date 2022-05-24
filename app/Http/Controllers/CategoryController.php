<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category = Category::latest()->get();
        return view('BackEnd.category.category_view')->with('categories',$category);
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
            'category_name' => 'required',
            'category_icon' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->category_name));

        $category = Category::where('category_name',$request->category_name)->first();

        if($category){
            Session::flash('warning','Category already Created.');
            return redirect()->back(); 
        }else{
            $category = Category::create([
            'category_name' => $request->category_name,
            'category_slug'=>$slug_title,
            'category_icon' => $request->category_icon
        ]);

        Session::flash('success','Category Created Successfully.');
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
        $category = Category::find($id);
        return view('BackEnd.category.category_edit')->with('category',$category);
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
        $category_update = Category::find($id);

        $this->validate($request,[
            'category_name' => 'required',
            'category_icon' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->category_name));

        $category_update->category_name = $request->category_name;
        $category_update->category_icon = $request->category_icon;
        $category_update->category_slug = $slug_title;
        // dd($request->all());
        $category_update->save();

        Session::flash('success','Category Updated Successfully.');
        return redirect()->route('category.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('info','Category Moved To Trashed Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $category = Category::onlyTrashed()->get();
        return view('BackEnd.category.trashed_category')->with('category',$category);
    }

    public function restore($id){
        $category = Category::withTrashed()->where('id',$id)->first();
        $category->restore();

        Session::flash('success','Category Restore Successfully.');
        return redirect()->back();
    }

    public function kill($id){
        $category = Category::withTrashed()->where('id',$id)->first();
        $category->forceDelete();

        Session::flash('info','Category Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();

        Session::flash('success','Successfully Category Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();

        Session::flash('success','Successfully Category Changed.');
        return redirect()->back();
    }

}
