<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPostCategory;
use App\Models\BlogPost;
use Session;
use Carbon\Carbon;

class BlogController extends Controller
{
    // ================= START BLOG INDEX METHOD ================= //
    public function BlogCategory(){

        $blogcategory = BlogPostCategory::latest()->get();

        return view('BackEnd.blog.category.category_view', compact('blogcategory'));
    } // end method

    // ================= END BLOG INDEX METHOD ================= //

    // ================= START BLOG STORE METHOD ================= //
    public function BlogCategoryStore(Request $request){

        $this->validate($request,[
            'blog_category_name' => 'required'
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->blog_category_name));

        $blogcategory = BlogPostCategory::where('blog_category_name',$request->blog_category_name)->first();

        if($blogcategory){
            Session::flash('warning','Blog Category already Created.');
            return redirect()->back(); 
        }else{
            $blogcategory = BlogPostCategory::create([
            'blog_category_name' => $request->blog_category_name,
            'blog_category_slug'=>$slug_title
        ]);

        Session::flash('success','Blog Category Created Successfully.');
        return redirect()->back();
        }
    } // end method

    // ================= END BLOG STORE METHOD ================= //

    // ================= START BLOG EDIT METHOD ================= //
    public function BlogCategoryEdit($id)
    {
        $blogcategory = BlogPostCategory::find($id);
        return view('BackEnd.blog.category.blog_category_edit')->with('blogcategory',$blogcategory);
    } // end method

    // ================= END BLOG EDIT METHOD ================= //

    // ================= START BLOG UPDATE METHOD ================= //
    public function BlogCategoryupdate(Request $request, $id)
    {
        $blogcategory_update = BlogPostCategory::find($id);

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

    // ================= END BLOG UPDATE METHOD ================= //

    // ================= START BLOG DELETE METHOD ================= //
    public function BlogCategorydestroy($id)
    {
        $blogcategory = BlogPostCategory::find($id);
        $blogcategory->delete();

        Session::flash('info','Blog Category Deleted Successfully.');
        return redirect()->back();
    } //end method

    // ================= END BLOG DELETE METHOD ================= //

    // ================= START BLOG ACTIVE/INACTIVE METHOD ================= //
    public function BlogCategoryActive($id){
        $blogcategory = BlogPostCategory::find($id);
        $blogcategory->status = 1;
        $blogcategory->save();

        Session::flash('success','Successfully BlogPostCategory Changed.');
        return redirect()->back();
    } // end method

    public function BlogCategoryInActive($id){
        $blogcategory = BlogPostCategory::find($id);
        $blogcategory->status = 0;
        $blogcategory->save();

        Session::flash('success','Successfully BlogPostCategory Changed.');
        return redirect()->back();
    } // end method 

    // ================= END BLOG ACTIVE/INACTIVE METHOD ================= //

    // ================= START BLOG VIEW BLOG POST METHOD ================= //
    public function ViewBlogPost(){

        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('BackEnd.blog.post.post_view',compact('blogpost','blogcategory'));
    }
    // ================= END BLOG VIEW BLOG POST METHOD ================= //

    // ================= START BLOG STORE BLOG POST METHOD ================= //
    public function BlogPostStore(Request $request)
    {
        $this->validate($request,[
            'post_title' => 'required',
            'blog_category_id' => 'required',
            'post_image' => 'required',
            'post_details' => 'required',
        ]);


        $slug_title  = strtolower(str_replace(' ', '-', $request->post_title));

        // start post image//
        $post= $request->post_image;
        $post_new_name = time().$post->getClientOriginalName();
        $post->move('uploads/post/',$post_new_name);
        // end post image //

        $post = BlogPost::insert([
            'post_title' => $request->post_title,
            'post_slug' => $slug_title,
            'blog_category_id' => $request->blog_category_id,
            'post_details' => $request->post_details,
            'post_image' => 'uploads/post/'.$post_new_name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Session::flash('success','Post Inserted Successfully.');
        return redirect()->back();

    } // end method
    // ================= END BLOG STORE BLOG POST METHOD ================= //

    // ================= START BLOG POST LIST METHOD ================= //
    public function BlogPostlist(){

        $blogpost = BlogPost::latest()->get();
        $blogcategory = BlogPostCategory::latest()->get();

        return view('BackEnd.blog.post.post_viewlist', compact('blogpost','blogcategory'));
    } // end method
    // ================= END BLOG POST LIST METHOD ================= //

    // ================= START BLOG POST EDIT METHOD ================= //
    public function BlogPostEdit($id)
    {
        $blogpost = BlogPost::find($id);
        $blogcategory = BlogPostCategory::latest()->get();
        return view('BackEnd.blog.post.blog_post_edit',compact('blogpost','blogcategory'));
    } // end method

    // ================= END BLOG POST EDIT METHOD ================= //

    // ================= START BLOG POST UPDATE METHOD ================= //
    public function BlogPostUpdate(Request $request, $id)
    {
        $blogpost_update = BlogPost::find($id);

        $this->validate($request,[
            'post_title' => 'required',
            'blog_category_id' => 'required',
            'post_details' => 'required',
        ]);

        $slug_title  = strtolower(str_replace(' ', '-', $request->post_title));

        // start brand image //
        if($request->hasfile('post_image')){
            // start post image//
            $post= $request->post_image;
            $post_new_name = time().$post->getClientOriginalName();
            $post->move('uploads/post/',$post_new_name);
            $blogpost_update->post_image = 'uploads/post/'.$post_new_name;
            // end post image //
        }
        // end brand image //

        $blogpost_update->post_title = $request->post_title;
        $blogpost_update->post_slug = $slug_title;
        $blogpost_update->blog_category_id = $request->blog_category_id;
        $blogpost_update->post_details = $request->post_details;

        // dd($request->all());
        $blogpost_update->save();

        Session::flash('success','Blog Post Updated Successfully.');
        return redirect()->route('view.post.list');
    } // end method
    // ================= END BLOG POST UPDATE METHOD ================= //

    // ================= START BLOG POST DELETE METHOD ================= //
    public function BlogPostDelete($id)
    {
        $blogpost = BlogPost::find($id);
        unlink($blogpost->post_image);
        $blogpost->delete();

        Session::flash('info',' Blog Post Deleted Successfully.');
        return redirect()->back();
    }
    // ================= END BLOG POST DELETE METHOD ================= //

    // ================= START BLOG POST ACTIVE/INACTIVE METHOD ================= //
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

    // ================= END BLOG POST ACTIVE/INACTIVE METHOD ================= //

}
