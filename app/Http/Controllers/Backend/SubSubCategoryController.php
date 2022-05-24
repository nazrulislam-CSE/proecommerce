<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Session;

class SubSubCategoryController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(){

    	$subsubcategories = SubSubCategory::latest()->get();
    	$categories = Category::latest()->get();
    	$subcategories = SubCategory::latest()->get();
        return view('BackEnd.category.subsubcategory_view',compact('subsubcategories','categories','subcategories'));
    }

    /*=================== End Index Methoed ===================*/

    /*=================== Start Store Methoed ===================*/
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

        Session::flash('success','Chield Category Inserted Successfully.');
        return redirect()->back();
        }
    }

    /*=================== End Store Methoed ===================*/

    /*=================== Start Edit Methoed ===================*/
    public function edit($id)
    {
        $subsubcategories = SubSubCategory::find($id);
        $category = Category::all();
        $subcategory = SubCategory::all();
        return view('BackEnd.category.subsubcategory_edit',compact('subsubcategories','category','subcategory'));
    }

    /*=================== End Edit Methoed ===================*/

    /*=================== Start Update Methoed ===================*/
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

        Session::flash('success','ChieldCategory Updated Successfully.');
        return redirect()->route('subsubcategory.all');
    }

    /*=================== End Update Methoed ===================*/

    /*=================== Start Delete Methoed ===================*/
    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->delete();

        Session::flash('info','Chield Category Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    /*=================== End Delete Methoed ===================*/

    /*=================== Start Active/Inactive Methoed ===================*/
    public function active($id){
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->status = 1;
        $subsubcategory->save();

        Session::flash('success','Successfully Chield Category Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->status = 0;
        $subsubcategory->save();

        Session::flash('success','Successfully Chield Category Changed.');
        return redirect()->back();
    }

    /*=================== End Active/Inactive Methoed ===================*/
}

