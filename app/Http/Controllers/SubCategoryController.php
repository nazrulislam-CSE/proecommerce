<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;
use Session;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = SubCategory::latest()->get();
        $category = Category::latest()->get();
        return view('BackEnd.category.subcategory_view')
                                        ->with('subcategories',$subcategory)
                                        ->with('categories',$category);
    }

    public function getsubcategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }

    public function getsubsubcategory($subcategory_id){

        $subsubbcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name','ASC')->get();
        return json_encode($subsubbcat);
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
            'subcategory_name' => 'required',
            'category_id' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->subcategory_name));

        $subcategory = SubCategory::where('subcategory_name',$request->subcategory_name)->first();

        if($subcategory){
            Session::flash('warning','SubCategory already Created.');
            return redirect()->back(); 
        }else{
            $subcategory = SubCategory::create([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug'=>$slug_title,
            'category_id' => $request->category_id
        ]);

        Session::flash('success','SubCategory Inserted Successfully.');
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
        $subcategory = SubCategory::find($id);
        $category = Category::all();
        return view('BackEnd.category.subcategory_edit')
                                    ->with('subcategories',$subcategory)
                                    ->with('category',$category);
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
        $subcategory_update = SubCategory::find($id);

        $this->validate($request,[
            'subcategory_name' => 'required',
            'category_id' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->subcategory_name));

        $subcategory_update->subcategory_name = $request->subcategory_name;
        $subcategory_update->subcategory_slug = $slug_title;
        $subcategory_update->category_id = $request->category_id;
        // dd($request->all());
        $subcategory_update->save();

        Session::flash('success','SubCategory Updated Successfully.');
        return redirect()->route('subcategory.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        Session::flash('info','SubCategory Moved To Trashed Successfully.');
        return redirect()->back();
    }

    public function trashed()
    {
        $subcategory = SubCategory::onlyTrashed()->get();
        return view('BackEnd.category.trashed_subcategory')->with('subcategory',$subcategory);
    }

    public function restore($id){
        $subcategory = SubCategory::withTrashed()->where('id',$id)->first();
        $subcategory->restore();

        Session::flash('success','SubCategory Restore Successfully.');
        return redirect()->back();
    }

    public function kill($id){
        $subcategory = SubCategory::withTrashed()->where('id',$id)->first();
        $subcategory->forceDelete();

        Session::flash('info','SubCategory Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    public function active($id){
        $subcategory = SubCategory::find($id);
        $subcategory->status = 1;
        $subcategory->save();

        Session::flash('success','Successfully SCategory Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $subcategory = SubCategory::find($id);
        $subcategory->status = 0;
        $subcategory->save();

        Session::flash('success','Successfully SCategory Changed.');
        return redirect()->back();
    }
}
