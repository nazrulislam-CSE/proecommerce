<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
class AdminController extends Controller
{
    /*=================== Start Index Login Methoed ===================*/
    public function Index(){

    	return view('admin.admin_login');
    } // end method

    /*=================== End Index Login Methoed ===================*/

    /*=================== Start Dashboard Methoed ===================*/
    public function Dashboard(){
    	
    	return view('admin.index');
    } // end method

    /*=================== End Dashboard Methoed ===================*/

    /*=================== Start Admin Login Methoed ===================*/
    public function Login(Request $request){

    	$this->validate($request,[
    		'email' =>'required',
    		'password' =>'required'
    	]);

    	// dd($request->all());
    	$check = $request->all();
    	if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password'=> $check['password'] ])){

    		return redirect()->route('admin.dashboard')->with('success','Admin Login Successfully.');
    	}else{
    		return back()->with('info','Invaild Email Or Password.');
    	}
    	
    } // end method

    /*=================== End Admin Login Methoed ===================*/

    /*=================== Start Logout Methoed ===================*/
    public function AminLogout(){
    	
    	Auth::guard('admin')->logout();
    	return redirect()->route('login_form')->with('success','Admin Logout Successfully.');
    } // end method
    /*=================== End Logout Methoed ===================*/

    /*=================== Start AdminRegister Methoed ===================*/
    public function AdminRegister(){
    	
    	return view('admin.admin_register');
    } // end method
    /*=================== End AdminRegister Methoed ===================*/

    /*=================== Start AdminRegisterStore Methoed ===================*/
    public function AdminRegisterStore(Request $request){

    	$this->validate($request,[
    		'name' =>'required',
    		'email' =>'required',
    		'password' =>'required',
    		'password_confirmation' =>'required'
    	]);
    	// dd($request->all());
    	Admin::insert([
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    		'created_at' => Carbon::now(),
    	]);

    	return redirect()->route('login_form')->with('success','Admin Created Successfully.');
    } // end method
    /*=================== End AdminRegisterStore Methoed ===================*/
}
