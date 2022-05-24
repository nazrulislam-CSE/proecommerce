<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminProfileController extends Controller
{
    public function AdminProfile(){

        $adminData = Admin::find(3);
        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function AdminProfileEdit(){

        $editData = Admin::find(3);
        return view('admin.admin_profile_edit', compact('editData'));
    } // End method 

    public function AdminProfileStore(Request $request){

        $data = Admin::find(3);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){

        $file = $request->file('profile_photo_path');
        $filename = date('Ymdhi').$file->getClientOriginalName();
        $file->move(public_path('uploads/admin_images'),$filename);
        $data['profile_photo_path'] = $filename; 

        }

        $data->save();
        return redirect()->route('admin.profile')->with('success','Admin Profile Created Successfully.');
    } // End method

    public function AdminChangePassword(){

        return view('admin.admin_change_password');

    } // End method


    public function AdminUpdateChangePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(3)->password;
        if (Hash::check($request->oldpassword,$hashedPassword)) {
            $admin = Admin::find(3);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout')->with('success','Admin Password Change Successfully.');
        }else{
            return redirect()->back()->with('error','Old password does not matched');
        }


    }// end method

    // ==================== Start All Users Route =================== //
    public function AllUsers(){

        $users = User::latest()->get();
        return view('BackEnd.user.all_user',compact('users'));
    } // end method
    // ==================== End All Users Route =================== //


}
