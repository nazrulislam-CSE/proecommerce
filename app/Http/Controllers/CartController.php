<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Wishlist;
use App\Models\Ship_division;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddToCart(Request $request, $id)
    {

        // start coupon any data remove //
        if(Session::has('coupon')){

           Session::forget('coupon'); 
        }
        // end coupon any data remove //


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
                'price' => $product->selling_price,
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json(['success'=> 'Successfully Added on Your Cart']);
        }
    } // end method 


    // Mini Cart Section //
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


    // Start Mini Cart Remove Section //
    public function RemoveMiniCart($rowId){

        Cart::remove($rowId);
        return response()->json(['success'=> 'Product Remove from Cart']);
    }

    // Start Add To Wishlist Section //
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

// coupon apply start //
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

    } // end method 


    // start coupon calculation //
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
    
    // end coupon calculation //

    // ============ start coupon remove ===============//
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }
    // ============ end coupon remove   ================//

    // ============ start checkout section ===============//

    // Checkout Method 
    public function CheckoutCreate(){

        if (Auth::check()) {
            // product empty thakle redirect kore home page a pathiye dibe conditions //
            if (Cart::total() > 0) {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        $divisions = Ship_division::orderBy('division_name','ASC')->get();
        return view('Frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));
                
            }else{

            Session::flash('warning','Shopping At list One Product');
            // $notification = array(
            // 'message' => 'Shopping At list One Product',
            // 'alert-type' => 'error' );

        return redirect()->to('/');

            }

            
        }else{

            Session::flash('success','You Need to Login First');
            // $notification = array(
            // 'message' => 'You Need to Login First',
            // 'alert-type' => 'error' );

        return redirect()->route('login');

        }

    } // end method 



    // public function CheckoutCreate(){

    //     if(Auth::check()){
    //         // product empty thakle redirect kore home page a pathiye dibe conditions //

    //         if(Cart::total() > 0){

    //         }else{
    //             Session::flash('error','Shopping At list One Product');
    //         }
    //         return redirect()->to('/');

    //     }else{
    //         Session::flash('error','You Need To Login First');
    //     }

    //     return redirect()->route('login');
    // } // end method
    // ============ end checkout section   ================//


    
}
