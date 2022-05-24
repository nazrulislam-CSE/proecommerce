<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship_division;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // ===================== division select ====================//
    public function DistrictGetAjax($division_id){

        $ship = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($ship);
    } // end method

    // ===================== district select ====================//
    public function StateGetAjax($district_id){

        $state = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($state);
    } // end method

    // ===================== start checkout store ====================//
    public function CheckoutStore(Request $request){

        // dd($request->all());
        $data = array();

        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        // check it //
        if($request->payment_method == 'stripe' ){

            return view('FrontEnd.payment.stripe',compact('data','cartTotal'));

        }else if($request->payment_method == 'card'){
            return 'card';
        }else{
            return 'cash';
        }

    }// end method
    // ===================== end checkout store ====================//
}
