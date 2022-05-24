<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Session;

class CategoryController extends Controller
{
    /*=================== Start Index Methoed ===================*/
    public function index(){
    	$categories = Category::latest()->get();
        return view('BackEnd.category.category_view',compact('categories'));
    }

    /*=================== End Index Methoed ===================*/

    /*=================== Start Store Methoed ===================*/
    public function store(Request $request){

    	$this->validate($request,[
            'category_name' => 'required',
            'category_icon' => 'required'
        ]);

        $category = Category::where('category_name',$request->category_name)->first();

        if($category){
            Session::flash('warning','Category already Created.');
            return redirect()->back(); 
        }else{

	        Category::insert([
				'category_name' => $request->category_name,
				'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
				'category_icon' => $request->category_icon,
				'created_at' => Carbon::now(),

	    	]);

	    	Session::flash('success','Category Created Successfully.');
        	return redirect()->back();
        }
    }
    /*=================== End Store Methoed ===================*/

    /*=================== Start Edit Methoed ===================*/
    public function edit($id)
    {
        $category = Category::find($id);
        return view('BackEnd.category.category_edit')->with('category',$category);
    }
    /*=================== Start Edit Methoed ===================*/

    /*=================== Start Update Methoed ===================*/
    public function update(Request $request, $id)
    {
        $category_update = Category::find($id);

        $this->validate($request,[
            'category_name' => 'required',
            'category_icon' => 'required'
        ]);

        $category_update->category_name = $request->category_name;
		$category_update->category_slug = strtolower(str_replace(' ', '-',$request->category_name));
        $category_update->category_icon = $request->category_icon;
        // dd($request->all());
        $category_update->save();

        Session::flash('success','Category Updated Successfully.');
        return redirect()->route('category.all');
    }
    /*=================== Start Update Methoed ===================*/

    /*=================== Start Destroy Methoed ===================*/
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('info','Category Parmanently Deleted Successfully.');
        return redirect()->back();
    }

    /*=================== Start Destroy Methoed ===================*/

    /*=================== Start Active/Inactive Methoed ===================*/
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
    /*=================== End Active/Inactive Methoed ===================*/
}