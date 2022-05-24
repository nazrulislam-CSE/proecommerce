<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Session;
use Hash;

class AdminUserController extends Controller
{
    // ================= START ADMIN USER ROLE METHOD ================= //
    public function AllAdminRole(){

        $adminuser = Admin::where('type',2)->latest()->get();

        return view('BackEnd.role.admin_role_all',compact('adminuser'));

    } // end method
    // ================= START ADMIN USER ROLE METHOD ================= //

    // ================= START ADMIN USER ROLE METHOD ================= //
    public function AddAdminRole(){
        return view('BackEnd.role.admin_role_create');
    } // end method
    // ================= START ADMIN USER ROLE METHOD ================= //

    // ================= START ADMIN USER ROLE STORE METHOD ================= //
    public function StoreAdminRole(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'profile_photo_path' => 'required'
        ]);

        // start admin user image//
        $image= $request->profile_photo_path;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/admin_images/',$image_new_name);
        // end admin user image //

        // $image = $request->file('profile_photo_path');
        // $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        // $save_url = 'upload/admin_images/'.$name_gen;

    $adminuser = Admin::where('name',$request->name)->first();

    if($adminuser){
        Session::flash('warning','User already Created.');
        return redirect()->back(); 
    }else{
        Admin::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'coupon' => $request->coupons,

        'shipping' => $request->shipping,
        'blog' => $request->blog,
        'setting' => $request->setting,
        'review' => $request->review,

        'alluser' => $request->alluser,
        'adminuserrole' => $request->adminuserrole,
        'type' => 2,
        'profile_photo_path' =>'uploads/admin_images/'.$image_new_name,
        'created_at' => Carbon::now(),
         

        ]);

        Session::flash('success', 'Admin User Created Successfully');
        return redirect()->route('all.admin.user');
    }

        // $notification = array(
        //     'message' => 'Admin User Created Successfully',
        //     'alert-type' => 'success'
        // );

        // return redirect()->route('all.admin.user')->with($notification);

    } // end method

    // ================= START ADMIN USER ROLE STORE METHOD ================= //

    // ================= START ADMIN USER ROLE EDIT METHOD ================= //
    public function EditAdminRole($id){

        $adminuser = Admin::findOrFail($id);
        return view('BackEnd.role.admin_role_edit',compact('adminuser'));

    } // end method 

    // ================= START ADMIN USER ROLE EDIT METHOD ================= //

    // ================= START ADMIN USER ROLE UPDATE METHOD ================= //
    public function UpdateAdminRole(Request $request, $id){

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
           
        ]);
        
        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

        unlink($old_img);
        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = 'upload/admin_images/'.$name_gen;

    Admin::findOrFail($id)->update([
        'name' => $request->name,
        'email' => $request->email,
         
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'coupons' => $request->coupons,

        'shipping' => $request->shipping,
        'blog' => $request->blog,
        'setting' => $request->setting,
        'review' => $request->review,

        'alluser' => $request->alluser,
        'adminuserrole' => $request->adminuserrole,
        'type' => 2,
        'profile_photo_path' => $save_url,
        'created_at' => Carbon::now(),

        ]);


        Session::flash('success', 'Admin User Updated Successfully');
        return redirect()->back();

        }else{

        Admin::findOrFail($id)->update([
        'name' => $request->name,
        'email' => $request->email,
         
        'phone' => $request->phone,
        'brand' => $request->brand,
        'category' => $request->category,
        'product' => $request->product,
        'slider' => $request->slider,
        'coupons' => $request->coupons,

        'shipping' => $request->shipping,
        'blog' => $request->blog,
        'setting' => $request->setting,
        'review' => $request->review,

        'alluser' => $request->alluser,
        'adminuserrole' => $request->adminuserrole,
        'type' => 2,
         
        'created_at' => Carbon::now(),

        ]);

        Session::flash('success', 'Admin User Updated Successfully');
        return redirect()->back();


        } // end else 

    } // end method 

    // ================= END ADMIN USER ROLE UPDATE METHOD ================= // 
}
