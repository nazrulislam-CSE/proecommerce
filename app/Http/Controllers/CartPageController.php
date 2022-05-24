<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function Mycart(){

     return view('FrontEnd.wishlist.view_mycart');
    } // end method

   public function GetCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),

        ));

    } //end method

    // cart remove //

    public function RemoveCartProduct($rowId){

        Cart::remove($rowId);

        if(Session::has('coupon')){

           Session::forget('coupon'); 
        }

        return response()->json(['success' => 'Successfully Remove From Cart']);
    } // end method

    // sart increment cart //

    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);



        // start copon match //
        if(Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
        }

        // end copon match //
 
        return response()->json('increment');

    } // end mehtod 

    // end Cart Increment 

    // sart deccrement cart //
    public function CartDecrement($rowId){

        $row= Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);


        // start copon match //
        if(Session::has('coupon')){

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
        }

        // end copon match //


        return response()->json('Decrement');
    } // end method
    
}


