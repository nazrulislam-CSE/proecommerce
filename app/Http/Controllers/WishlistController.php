<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    // start viewishlist //
    public function ViewWishlist(){

        return view('FrontEnd.wishlist.view_wishlist');
    } // end method


    public function GetWishlistProduct(){

        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    } // end mehtod 

    // // start viewishlist product //
    // public function getWishlistProduct(){

    //     $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
    //     return response()->json($wishlist);

    // } //end method


    // start remove wishlist product //
    public function RemoveWishlistProduct($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();

        return response()->json(['success'=>'Successfully Wishlist Product Remove']);

    } //end method
}
