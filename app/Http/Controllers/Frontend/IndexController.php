<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg; 
use App\Models\BlogPost; 
use App\Models\BlogCategory; 
use Session;
use Illuminate\Support\Facades\Hash;
use Image;

class IndexController extends Controller
{
	/* ================= Start Index Method ====================== */
    public function index(){
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(10)->get();
        $products_category = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(5)->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $featured = Product::orderBy('featured','DESC')->where('status','=',1)->limit(6)->get();

        $skip_category_0 = Category::skip(1)->first();
        $skip_product_0 = Product::where('status','=',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_1 = Category::skip(2)->first();
        $skip_product_1 = Product::where('status','=',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $new_arrivals = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();

        $blogpost = BlogPost::where('status',1)->orderBy('id','DESC')->limit(5)->get();


        $hot_deals = Product::orderBy('hot_deals','DESC')->where('status','=',1)->where('discount_price','!=',NULL)->limit(3)->get();
        $special_offer = Product::orderBy('special_offer','DESC')->where('status','=',1)->limit(3)->get();
        $special_deals = Product::orderBy('special_deals','DESC')->where('status','=',1)->limit(3)->get();

    	return view('Frontend.index', compact('categories','sliders','products_category','products','featured','skip_category_0','skip_product_0','skip_category_1','skip_product_1','new_arrivals','blogpost','hot_deals','special_offer','special_deals'));
    }
   /* ================= End Index Method ========================= */

   /* ================= Start productDetails Method ====================== */
    public function productDetails($id,$slug){

        $product = Product::findorFail($id);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

        $multiImg = MultiImg::where('product_id',$id)->get();

        /* ================= Product Color Eng ================== */
        $color_en = $product->product_color;
        $product_color_en = explode(',', $color_en);

        /* ================= Product Size Eng =================== */
        $size_en = $product->product_size;
        $product_size_en = explode(',', $size_en);

        /* ================= Realted Product ==================== */
        $cat_id = $product->category_id;
        $realtedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

        return view('Frontend.product.product_details', compact('product','categories','hot_deals','multiImg','product_color_en','product_size_en','realtedProduct'));
    }

    /* ================= End productDetails Method ====================== */

    /* =================== Start SubcatWiseProduct Method ===================== */
    public function SubcatWiseProduct($id,$slug){

        $products = Product::where('status','=',1)->where('subcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // catagories all //
        $sub_categories = Category::orderBy('category_name','ASC')->where('status','=',1)->get();

        return view('FrontEnd.product.subcategory_view',compact('products','categories','sub_categories'));
    }
    /* =================== End SubcatWiseProduct Method ======================= */

    /* =================== Start Chield CategoryWiseProduct Method ===================== */
    public function SubSubcatWiseProduct($id,$slug){

        $products = Product::where('status','=',1)->where('subsubcategory_id',$id)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // catagories all //
        $sub_subcategories = Category::orderBy('category_name','ASC')->where('status','=',1)->get();
        return view('FrontEnd.product.sub_subcategory_view',compact('products','categories','sub_subcategories'));
    }

    /* =================== End Chield CategoryWiseProduct Method ======================= */

    /* =================== Start TagWiseProduct Method ===================== */
    public function TagWiseProduct($tag){

        $products = Product::where('status','=',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(3);
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();
        // catagories all //
        $tag_categories = Category::orderBy('category_name','ASC')->where('status','=',1)->get();
        return view('FrontEnd.product.product_tags',compact('products','categories','tag_categories'));
    }

    /* =================== Start TagWiseProduct Method ===================== */

    /* ================= START BLOG POST METHOD ================= */

    public function SinglePost($id,$slug){

        $post = BlogPost::findorFail($id);

        $blogcategory = BlogCategory::latest()->get();

        $popular = BlogPost::orderBy('created_at','desc')->skip(1)->take(2)->get();
        $recent = BlogPost::orderBy('created_at','ASC')->skip(1)->take(2)->get();
        $categories = Category::orderBy('category_name','ASC')->where('status','=',1)->limit(9)->get();

        return view('FrontEnd.product.single-post', compact('post','popular','recent','categories','blogcategory'));
    }
    /* ================= START BLOG POST METHOD ================= */

    /* ================= START PRODUCT VIEW WITH MODAL METHOD ================= */
    public function ProductViewAjax($id){

        $product = Product::with('category','brand')->findOrFail($id);

        /* ================= Product Color Eng ================== */
        $color_en = $product->product_color;
        $product_color = explode(',', $color_en);

        /* ================= Product Size Eng =================== */
        $size_en = $product->product_size;
        $product_size= explode(',', $size_en);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size,
        ));
    }
    /* ================= END PRODUCT VIEW WITH MODAL METHOD =================== */

   /* ================= Start User Logout Method ================= */
    public function UserLogout(){

        Auth::logout();
        Session::flash('success','User Logout Successfully');
        return redirect()->route('login');
    } // end method
    /* ================= End User Logout Method ================== */

    /* ================= Start User Profile Method ================ */
    public function UserProfile(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('FrontEnd.profile.user_profile',compact('user'));


    } // end method

    /* ================= End User Profile Method ================ */

   /* ================= Start User Profile Store Method ================ */
    public function UserProfileStore(Request $request){

        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            Image::make($file)->resize(224,224)->save('uploads/user_images/'.$filename);
            $data['profile_photo_path'] = $filename;
        }

        $data->save();
        Session::flash('success','User Profile Updated Successfully');
        return redirect()->route('dashboard');


    } //end method 

    /* ================= End User Profile Store Method ================ */

    /* ================= Start User Passowrd Change Method ================ */
    public function UserChangePassword(){

        return view('FrontEnd.profile.change_password');

    } //end method


    /* ================= End User Passowrd Change Method ================ */

    /* ================= Start User Passowrd Change Method ================ */
    public function UserPasswordUpdate(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            Session::flash('success','User Password Change Successfully.');
            return redirect()->route('user.logout');
        }else{
        	Session::flash('warning','Old password does not matched');
            return redirect()->back();
        }


    }// end method
    /* ================= End User Passowrd Change Method ================ */

    /* ================= Start All User  Method ========================= */
    public function AllUsers(){

        $users = User::latest()->get();
        return view('BackEnd.user.all_user',compact('users'));
    } // end method
    /* ================= End All User  Method =========================== */


    /* ================= Start Product Seach Method ========================= */
    public function ProductSearch(Request $request){

        $request->validate(["search" => "required"]);

        $item = $request->search;
        // echo "$item";
        $categories = Category::orderBy('category_name','ASC')->get();
        $sub_categories = Category::orderBy('category_name','ASC')->where('status','=',1)->get();
        $products = Product::where('product_name','LIKE',"%$item%")->get();
        return view('frontend.product.search',compact('products','categories','sub_categories'));

    } // end method 

    /* ================= End Product Seach Method =========================== */

    /* ================= Start Product Seach Method ========================= */
    public function SearchProduct(Request $request){

        $request->validate(["search" => "required"]);

        $item = $request->search;        
        
        $products = Product::where('product_name','LIKE',"%$item%")->select('product_name','product_thambnail','selling_price','id','product_slug')->limit(10)->get();
        return view('frontend.product.search_product',compact('products'));

    } // end method 
    /* ================= End Product Seach Method =========================== */
}
