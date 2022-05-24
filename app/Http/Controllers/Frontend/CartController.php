<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\Wishlist;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /*=================== Start AddToCart Methoed ===================*/
    public function AddToCart(Request $request, $id){

    	$product = Product::findOrFail($id);
    	if($product->discount_price == NULL){

            Cart::add([
                'id' => $id,
                'name' => $request->product_name, 
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success'=> 'Successfully Added on Your Cart']);

        }else{

            Cart::add([
                'id' => $id,
                'name' => $request->product_name, 
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success'=> 'Successfully Added on Your Cart']);
        }
    }
    /*=================== End AddToCart Methoed ===================*/

    /*=================== Start Mini Cart  Methoed ===================*/
    public function AddMiniCart(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));

    } // end method

    /*=================== End Mini Cart  Methoed ===================*/

    /*=================== Start Remove Mini Cart  Methoed ===================*/
    public function RemoveMiniCart($rowId){

        Cart::remove($rowId);
        return response()->json(['success'=> 'Product Remove from Cart']);
    }

    /*=================== End Remove Mini Cart  Methoed ===================*/

    /*=================== Start AddToWishlist Cart  Methoed ===================*/
    public function AddToWishlist(Request $request, $product_id){

    	if(Auth::check()){

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if(!$exists){

                Wishlist::insert([

                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['success'=> 'Successfully Added On Your Wishlist']);

            }else{

                return response()->json(['error'=> 'This Product has Already On Your Wishlist']);
            }


        }else{
            return response()->json(['error'=> 'At First Login Your Account']);
        }
    } // end method

    /*=================== End AddToWishlist Cart  Methoed ===================*/

    /*=================== Start CouponApply  Methoed ===================*/
    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));
            
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    } // end method \


    /*=================== End CouponApply  Methoed ===================*/

    /*=================== Start CouponCalculation  Methoed ===================*/
    public function CouponCalculation(){

        if (Session::has('coupon')) {
            return response()->json(array(

                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
                
                
            ));
        }else{
            return response()->json(array(

                'total' => Cart::total(),
            ));

        }
    } // end method 

    /*=================== End CouponCalculation  Methoed ===================*/

    /* ============ Start Coupon Remove =============== */
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }
    /* ============ End Coupon Remove =============== */

    /*=================== Start Checkout Section ===================*/
    public function CheckoutCreate(){

        if(Auth::check()) {
            if(Cart::total() > 0){

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShipDivision::orderBy('division_name','ASC')->get();
                return view('Frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));

            }else{
                Session::flash('warning','Shopping At list One Product');
                return redirect()->to('/');
            }
        }else{

            Session::flash('success','You Need to Login First');
            return redirect()->route('login');
        }
    }
    /*=================== End Checkout Section =====================*/


}
