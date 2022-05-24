<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
	/* ================= Start ReportView Method =================== */
    public function ReportView(){
     	return view('backend.report.report_view');
    } // end method
    /* ================= Start ReportView Method =================== */

    /* ================= Start ReportView Method =================== */
    public function ReportByDate(Request $request){
	   	// return $request->all();
	   	$date = new DateTime($request->date);
	   	$formatDate = $date->format('d F Y');
	   	// return $formatDate;
	   	$orders = Order::where('order_date',$formatDate)->latest()->get();
	   	return view('backend.report.report_show',compact('orders'));
	} // end mehtod 
    /* ================= End ReportView Method =================== */

    /* ================= Start ReportView Method =================== */
    public function ReportByMonth(Request $request){

    	$orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
    	return view('backend.report.report_show',compact('orders'));

   } // end mehtod 
    /* ================= End ReportView Method =================== */

    /* ================= Start ReportByYear Method =================== */
    public function ReportByYear(Request $request){

   		$orders = Order::where('order_year',$request->year)->latest()->get();
   			return view('backend.report.report_show',compact('orders'));

   } // end mehtod 
   /* ================= End ReportByYear Method =================== */
   

}

