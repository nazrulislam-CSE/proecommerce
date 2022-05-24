<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Session;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    
    /* ================= START BLOG INDEX METHOD ================= */
    public function BlogCategory(){

        $blogcategory = BlogCategory::latest()->get();

        return view('BackEnd.blog.category.category_view', compact('blogcategory'));
    } // end method

    /* ================= END BLOG INDEX METHOD ================= */

    /* ================= START BLOG STORE METHOD ================= */
    public function BlogCategoryStore(Request $request){

        $this->validate($request,[
            'blog_category_name' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->blog_category_name));

        $blogcategory = BlogCategory::where('blog_category_name',$request->blog_category_name)->first();

        if($blogcategory){
            Session::flash('warning','Blog Category already Created.');
            return redirect()->back(); 
        }else{
            $blogcategory = BlogCategory::create([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug'=>$slug_title
        ]);

        Session::flash('success','Blog Category Created Successfully.');
        return redirect()->back();
        }
    } // end method

    /* ================= END BLOG STORE METHOD ================= */

    /* ================= START BLOG EDIT METHOD ================= */
    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogCategory::find($id);
        return view('BackEnd.blog.category.blog_category_edit')->with('blogcategory',$blogcategory);
    } // end method

    /* ================= START BLOG EDIT METHOD ================= */

    /* ================= START BLOG UPDATE METHOD ================= */
    public function BlogCategoryupdate(Request $request, $id)
    {
        $blogcategory_update = BlogCategory::find($id);

        $this->validate($request,[
            'blog_category_name' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->blog_category_name));

        $blogcategory_update->blog_category_name = $request->blog_category_name;
        $blogcategory_update->blog_category_slug = $slug_title;
        // dd($request->all());
        $blogcategory_update->save();

        Session::flash('success','Blog Category Updated Successfully.');
        return redirect()->route('blog.category');
    } // end method

    /* ================= END BLOG UPDATE METHOD ================= */

    /* ================= START BLOG DELETE METHOD ================= */
    public function BlogCategorydestroy($id)
    {
        $blogcategory = BlogCategory::find($id);
        $blogcategory->delete();

        Session::flash('info','Blog Category Deleted Successfully.');
        return redirect()->back();
    } //end method

    /* ================= END BLOG DELETE METHOD ================= */

    /* ================= START BLOG ACTIVE/INACTIVE METHOD ================= */
    public function BlogCategoryActive($id){
        $blogcategory = BlogCategory::find($id);
        $blogcategory->status = 1;
        $blogcategory->save();

        Session::flash('success','Successfully BlogPostCategory Changed.');
        return redirect()->back();
    } // end method

    public function BlogCategoryInActive($id){
        $blogcategory = BlogCategory::find($id);
        $blogcategory->status = 0;
        $blogcategory->save();

        Session::flash('success','Successfully BlogPostCategory Changed.');
        return redirect()->back();
    } // end method 

    /* ================= END BLOG ACTIVE/INACTIVE METHOD ================= */

    /* ================= START BLOG VIEW BLOG POST METHOD ================= */
    public function ViewBlogPost(){

        $blogcategory = BlogCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('BackEnd.blog.post.post_view',compact('blogpost','blogcategory'));
    }
    /* ================= END BLOG VIEW BLOG POST METHOD ================= */

    /* ================= START BLOG STORE BLOG POST METHOD ================= */
    public function BlogPostStore(Request $request)
    {
        $this->validate($request,[
            'post_title' => 'required',
            'blog_category_id' => 'required',
            'post_image' => 'required',
            'post_details' => 'required',
        ]);


        $slug_title  = strtolower(str_replace(' ', '-', $request->post_title));

        $image = $request->file('post_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(780,433)->save('uploads/post/'.$name_gen);
    	$save_url = 'uploads/post/'.$name_gen;


        $post = BlogPost::insert([
            'post_title' => $request->post_title,
            'post_slug' => $slug_title,
            'blog_category_id' => $request->blog_category_id,
            'post_details' => $request->post_details,
            'post_image' => $save_url ,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::flash('success','Post Inserted Successfully.');
        return redirect()->back();

    } // end method
    /* ================= END BLOG STORE BLOG POST METHOD ================= */

    /* ================= START BLOG POST LIST METHOD ================= */
    public function BlogPostlist(){

        $blogpost = BlogPost::latest()->get();
        $blogcategory = BlogCategory::latest()->get();

        return view('BackEnd.blog.post.post_viewlist', compact('blogpost','blogcategory'));
    } // end method
    /* ================= END BLOG POST LIST METHOD ================= */

    /* ================= START BLOG POST EDIT METHOD ================= */
    public function BlogPostEdit($id)
    {
        $blogpost = BlogPost::find($id);
        $blogcategory = BlogCategory::latest()->get();
        return view('BackEnd.blog.post.blog_post_edit',compact('blogpost','blogcategory'));
    } // end method

    /* ================= END BLOG POST EDIT METHOD ================= */

    /* ================= START BLOG POST UPDATE METHOD ================= */
    public function BlogPostUpdate(Request $request)
    {
        $this->validate($request,[
            'post_title' => 'required',
            'blog_category_id' => 'required',
            'post_details' => 'required',
        ]);


        $post_slug  = strtolower(str_replace(' ', '-', $request->post_title));

        $blogpost_id = $request->id;
    	$old_img = $request->old_image;

    	if ($request->file('post_image')) {

	    	unlink($old_img);
	    	$image = $request->file('post_image');
	    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
	    	Image::make($image)->resize(870,370)->save('uploads/post/'.$name_gen);
	    	$save_url = 'uploads/post/'.$name_gen;

			BlogPost::findOrFail($blogpost_id)->update([
				'post_title' => $request->post_title,
				'post_slug' => $request->post_slug,
				'blog_category_id' => $request->blog_category_id,
				'post_details' => $request->post_details,
				'post_image' => $save_url,

	    	]);


        	Session::flash('success','Blog Post Updated Successfully.');
        	return redirect()->route('view.post.list');

    	}else{

    		BlogPost::findOrFail($blogpost_id)->update([
				'post_title' => $request->post_title,
				'post_slug' => $request->post_slug,
				'blog_category_id' => $request->blog_category_id,
				'post_details' => $request->post_details,

	    	]);

	    	Session::flash('info','Blog Post Updated Without Image Successfully.');
        	return redirect()->route('view.post.list');


    	} // end else 

    } // end method
    /* ================= END BLOG POST UPDATE METHOD ================= */

    /* ================= START BLOG POST DELETE METHOD ================= */
    public function BlogPostDelete($id)
    {
        $blogpost = BlogPost::find($id);
        unlink($blogpost->post_image);
        $blogpost->delete();

        Session::flash('info',' Blog Post Deleted Successfully.');
        return redirect()->back();
    }
    /* ================= END BLOG POST DELETE METHOD ================= */

    /* ================= START BLOG POST ACTIVE/INACTIVE METHOD ================= */
    public function BlogPostActive($id){
        $blogpost = BlogPost::find($id);
        $blogpost->status = 1;
        $blogpost->save();

        Session::flash('success','Successfully BlogPost Changed.');
        return redirect()->back();
    } // end method

    public function BlogPostInActive($id){
        $blogpost = BlogPost::find($id);
        $blogpost->status = 0;
        $blogpost->save();

        Session::flash('success','Successfully BlogPost Changed.');
        return redirect()->back();
    } // end method 

    /* ================= END BLOG POST ACTIVE/INACTIVE METHOD ================= */
}
