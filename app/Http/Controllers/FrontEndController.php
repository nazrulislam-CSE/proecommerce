<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Auth;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $blogpost = BlogPost::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        $featured = Product::orderBy('featured','DESC')->where('status','=',1)->limit(6)->get();
        $hot_deals = Product::orderBy('hot_deals','DESC')->where('status','=',1)->where('discount_price','!=',NULL)->limit(3)->get();
        $special_offer = Product::orderBy('special_offer','DESC')->where('status','=',1)->limit(3)->get();
        $special_deals = Product::orderBy('special_deals','DESC')->where('status','=',1)->limit(3)->get();
        $products_category = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(5)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();

        // fashion category //
        $skip_category_0 = Category::skip(1)->first();
        $skip_product_0 = Product::where('status','=',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        // electronics category //
        $skip_category_1 = Category::skip(2)->first();
        $skip_product_1 = Product::where('status','=',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();
        // brands with product show //
        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status','=',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();
        // return $skip_category->id;
        // die();

        return view('FrontEnd.main_master',
            compact('categories','sliders','products_category','products','featured','hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1','blogpost'));
    }

    // product details //
    public function productDetails($id,$slug){

        $product = Product::findorFail($id);

        // product color eng //
        $color_en = $product->product_color;
        $product_color_en = explode(',', $color_en);

        // product size eng //
        $size_en = $product->product_size;
        $product_size_en = explode(',', $size_en);

        // $data['size_en'] =$product->product_size;
        // $data['product_size_en'] = explode(',', $size_en);

        $multiImg = MultiImg::where('product_id',$id)->get();
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // hot heals //
        $hot_deals = Product::orderBy('hot_deals','DESC')->where('status','=',1)->where('discount_price','!=',NULL)->limit(3)->get();
        // realted product //
        $cat_id = $product->category_id;
        $realtedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        return view('FrontEnd.product_details',compact('categories','hot_deals','product','multiImg','product_color_en','product_size_en','realtedProduct'));
    }

    // product tag wise product //
    public function TagWiseProduct($tag){

        $products = Product::where('status','=',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // catagories all //
        $tag_categoies = Category::orderBy('category_name','ASC')->where('status','=',1)->get();
        return view('FrontEnd.product_tags',compact('products','categories','tag_categoies'));
    }

    // product subcategory wise product //
    public function SubcatWiseProduct($id,$slug){

        $products = Product::where('status','=',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // catagories all //
        $sub_categoies = Category::orderBy('category_name','ASC')->where('status','=',1)->get();
        return view('FrontEnd.subcategory_view',compact('products','categories','sub_categoies'));
    }

    // product susubbcategory wise product //
    public function SubSubcatWiseProduct($id,$slug){

        $products = Product::where('status','=',1)->where('subsubcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // catagories all //
        $sub_subcategoies = Category::orderBy('category_name','ASC')->where('status','=',1)->get();
        return view('FrontEnd.sub_subcategory_view',compact('products','categories','sub_subcategoies'));
    }
    // Product View With Ajax //
    public function ProductViewAjax($id){

        $product = Product::with('category','brand')->findOrFail($id);

        // product color eng //
        $color_en = $product->product_color;
        $product_color = explode(',', $color_en);

        // product size eng //
        $size_en = $product->product_size;
        $product_size = explode(',', $size_en);

        // json formate pass data //
        return response()->json(array(
            'product' =>$product,
            'color' =>$product_color,
            'size' =>$product_size,
        ));

    } // end method

    // user logout //
    public function UserLogout(){

        Auth::logout();
        return Redirect()->route('login');
    } // end method

    // user profile change //
    public function UserProfile(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('FrontEnd/profile/.user_profile',compact('user'));


    } // end method

    // user profile update //
    public function UserProfileStore(Request $request){

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/user_images/'),$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        Session::flash('success','User Profile Updated Successfully');
        return redirect()->route('dashboard');


    } //end method 

    // user password change //
    public function UserChangePassword(){

        return view('FrontEnd.profile.change_password');

    } //end method

    // user password update //
    public function UserPasswordUpdate(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout')->with('success','User Password Change Successfully.');
        }else{
            return redirect()->back()->with('error','Old password does not matched');
        }


    }// end method

    // ================= START BLOG POST METHOD ================= //

    public function SinglePost($id,$slug){

        $post = BlogPost::findorFail($id);

        $blogcategory = BlogPostCategory::latest()->get();

        $popular = BlogPost::orderBy('created_at','desc')->skip(1)->take(2)->get();
        $recent = BlogPost::orderBy('created_at','ASC')->skip(1)->take(2)->get();
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();

        return view('FrontEnd.single-post', compact('post','popular','recent','categories','blogcategory'));
    }
    // ================= START BLOG POST METHOD ================= //


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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
