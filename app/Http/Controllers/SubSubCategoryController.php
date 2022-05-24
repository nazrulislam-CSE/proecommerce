<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use Session;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcategory = SubSubCategory::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('BackEnd.category.subsubcategory_view')
                                        ->with('subsubcategories',$subsubcategory)
                                        ->with('categories',$category)
                                        ->with('subcategories',$subcategory);
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
            'subsubcategory_name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->subsubcategory_name));

        $subsubcategory = SubSubCategory::where('subsubcategory_name',$request->subsubcategory_name)->first();

        if($subsubcategory){
            Session::flash('warning','SubSubCategory already Created.');
            return redirect()->back(); 
        }else{
            $subsubcategory = SubSubCategory::create([
            'subsubcategory_name' => $request->subsubcategory_name,
            'subsubcategory_slug'=>$slug_title,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);

        Session::flash('success','Sub-SubCategory Inserted Successfully.');
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
        $subsubcategory = SubSubCategory::find($id);
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('BackEnd.category.subsubcategory_edit')
                                    ->with('subsubcategories',$subsubcategory)
                                    ->with('category',$category)
                                    ->with('subcategory',$subcategory);
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
        $subsubcategory_update = SubSubCategory::find($id);

        $this->validate($request,[
            'subsubcategory_name' => 'required',
            'subcategory_id' => 'required',
            'category_id' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->subsubcategory_name));

        $subsubcategory_update->subsubcategory_name = $request->subsubcategory_name;
        $subsubcategory_update->subsubcategory_slug = $slug_title;
        $subsubcategory_update->category_id = $request->category_id;
        $subsubcategory_update->subcategory_id = $request->subcategory_id;
        // dd($request->all());
        $subsubcategory_update->save();

        Session::flash('success','SubSubCategory Updated Successfully.');
        return redirect()->route('subsubcategory.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->delete();

        Session::flash('info','SubSubCategory Moved To Trashed Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $subsubcategory = SubSubCategory::onlyTrashed()->get();
        return view('BackEnd.category.trashed_subsubcategory')->with('subsubcategory',$subsubcategory);
    }

    public function restore($id){
        $subsubcategory = SubSubCategory::withTrashed()->where('id',$id)->first();
        $subsubcategory->restore();

        Session::flash('success','SubSubCategory Restore Successfully.');
        return redirect()->back();
    }

    public function kill($id){
        $subsubcategory = SubSubCategory::withTrashed()->where('id',$id)->first();
        $subsubcategory->forceDelete();

        Session::flash('info','SubSubCategory Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->status = 1;
        $subsubcategory->save();

        Session::flash('success','Successfully SubSubCategory Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->status = 0;
        $subsubcategory->save();

        Session::flash('success','Successfully SubSubCategory Changed.');
        return redirect()->back();
    }
}
