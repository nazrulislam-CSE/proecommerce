<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Session;

class CouponController extends Controller
{
    public function CouponView(){

        $coupons = Coupon::orderBy('id','DESC')->get();
        return view('BackEnd.coupon.view_coupon', compact('coupons'));
    }

    // coupon store //
    public function CouponStore(Request $request)
    {
        $this->validate($request,[
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);


        $coupon = Coupon::where('coupon_name',$request->coupon_name)->first();

        if($coupon){
            Session::flash('warning','Coupon already Created.');
            return redirect()->back(); 
        }else{
            $coupon = Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Coupon Inserted Successfully.');
        return redirect()->back();
        }
    }

    // coupon edit //
    public function CouponEdit($id){

        $coupons = Coupon::find($id);
        return view('BackEnd.coupon.edit_coupon', compact('coupons'));
    }

    // coupon update //
    public function CouponUpdate(Request $request, $id){

        $this->validate($request,[
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);

        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount'=>$request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Coupon Updated Successfully');
        return redirect()->route('manage.coupon');

    }

    // coupon delete //
    public function CouponDelete($id){

        Coupon::findOrFail($id)->delete();
        Session::flash('info','Coupon Deleted Successfully');
        return redirect()->back();
    }

    // coupon active //
    public function couponactive($id){
        $coupon = Coupon::find($id);
        $coupon->status = 1;
        $coupon->save();

        Session::flash('success','Successfully Coupon Changed.');
        return redirect()->back();
    }

    // coupon inactive //
    public function couponinactive($id){
        $coupon = Coupon::find($id);
        $coupon->status = 0;
        $coupon->save();

        Session::flash('success','Successfully Coupon Changed.');
        return redirect()->back();
    }
}
