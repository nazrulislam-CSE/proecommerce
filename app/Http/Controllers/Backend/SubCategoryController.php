<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Session;

class SubCategoryController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(){

    	$subcategories = SubCategory::latest()->get();
    	$categories = Category::latest()->get();
        return view('BackEnd.category.subcategory_view',compact('subcategories','categories'));
    }

    /*=================== End Index Methoed ===================*/

    /*================ Start Ajax Category Click SubCategory Show ==================*/
    public function getsubcategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);
    }

    public function getsubsubcategory($subcategory_id){

        $subsubbcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name','ASC')->get();
        return json_encode($subsubbcat);
    }
    
    /*================ End Ajax Category Click SubCategory Show ==================*/

    /*=================== Start Store Methoed ===================*/
    public function store(Request $request){

    	$this->validate($request,[
            'subcategory_name' => 'required',
            'category_id' => 'required'
        ]);

        $category = SubCategory::where('subcategory_name',$request->subcategory_name)->first();

        if($category){
            Session::flash('warning','SubCategory already Created.');
            return redirect()->back(); 
        }else{

	        SubCategory::insert([
				'subcategory_name' => $request->subcategory_name,
				'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
				'created_at' => Carbon::now(),
				'category_id' => $request->category_id

	    	]);

	    	Session::flash('success','SubCategory Created Successfully.');
        	return redirect()->back();
        }
    }
    /*=================== End Store Methoed ===================*/

    /*=================== Start Edit Methoed ===================*/
    public function edit($id)
    {
        $subcategories = SubCategory::find($id);
        $categories = Category::all();
        return view('BackEnd.category.subcategory_edit',compact('subcategories','categories'));
    }
    /*=================== Start Edit Methoed ===================*/

    /*=================== Start Update Methoed ===================*/
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

    /*=================== Start Update Methoed ===================*/

    /*=================== Start Destroy Methoed ===================*/
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();

        Session::flash('info','SubCategory Moved To Trashed Successfully.');
        return redirect()->back();
    }

    /*=================== Start Destroy Methoed ===================*/

    /*=================== Start Active/Inactive Methoed ===================*/
    public function active($id){
        $subcategory = SubCategory::find($id);
        $subcategory->status = 1;
        $subcategory->save();

        Session::flash('success','Successfully SubCategory Changed.');
        return redirect()->back();
    }

    public function inactive($id){
        $subcategory = SubCategory::find($id);
        $subcategory->status = 0;
        $subcategory->save();

        Session::flash('success','Successfully SubCategory Changed.');
        return redirect()->back();
    }
    /*=================== End Active/Inactive Methoed ===================*/
}
