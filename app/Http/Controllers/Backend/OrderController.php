<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;
use Session;

class OrderController extends Controller
{
    /*=================== Start PendingOrders Methoed ===================*/
	public function PendingOrders(){
		$orders = Order::where('status','pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));

	} // end mehtod 

	/*=================== End PendingOrders Methoed ===================*/

	/*=================== Start PendingOrdersDetails Methoed ===================*/
	public function PendingOrdersDetails($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('backend.orders.pending_orders_details',compact('order','orderItem'));

	} // end method 
	/*=================== End PendingOrdersDetails Methoed ===================*/

	/*=================== Start ConfirmedOrders Methoed ===================*/
	public function ConfirmedOrders(){
		$orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));

	} // end mehtod

	/*=================== End ConfirmedOrders Methoed ===================*/

	/*=================== Start ProcessingOrders Methoed ===================*/
	public function ProcessingOrders(){
		$orders = Order::where('status','processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));

	} // end mehtod 

	/*=================== End ProcessingOrders Methoed ===================*/

	/*=================== Start DeliveredOrders Methoed ===================*/
	public function DeliveredOrders(){
		$orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));

	} // end mehtod 
	/*=================== End DeliveredOrders Methoed ===================*/

	/*=================== Start CancelOrders Methoed ===================*/
	public function CancelOrders(){
		$orders = Order::where('status','cancel')->orderBy('id','DESC')->get();
		return view('backend.orders.cancel_orders',compact('orders'));

	} // end mehtod 
	/*=================== End CancelOrders Methoed ===================*/


	/* ==================================== Update Status ======================================== */
	/* ==================================== Update Status ======================================== */

	/* =================== Start CancelOrders Methoed =================== */
	public function PendingToConfirm($order_id){

	Order::findOrFail($order_id)->update(['status' => 'confirm']);

	Session::flash('success','Order Confirm Successfully.');
	return redirect()->route('pending.orders');

	} // end method

	/* =================== End CancelOrders Methoed =================== */

	/* =================== Start CancelOrders Methoed =================== */
	public function ConfirmToProcessing($order_id){
   
    Order::findOrFail($order_id)->update(['status' => 'processing']);

	Session::flash('success','Order Processing Successfully.');
	return redirect()->route('confirmed.orders');

	} // end method

	/* =================== End CancelOrders Methoed =================== */

	/* =================== Start ShippedToDelivered Methoed =================== */
	public function ProcessingToDelivered($order_id){

	$product = OrderItem::where('order_id',$order_id)->get();
	foreach ($product as $item) {
	 	Product::where('id',$item->product_id)
	 	->update(['product_qty' => DB::raw('product_qty-'.$item->qty)]);
	 } 
 
      Order::findOrFail($order_id)->update(['status' => 'delivered']);

      Session::flash('success','Order Delivered Successfully.');
	  return redirect()->route('delivered.orders');

	} // end method
	/* =================== Start ShippedToDelivered Methoed =================== */

	/* =================== Start AdminInvoiceDownload Methoed =================== */
	public function AdminInvoiceDownload($order_id){

		$order = Order::with('division','district','state','user')->where('id',$order_id)->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	 
		$pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
				'tempDir' => public_path(),
				'chroot' => public_path(),
		]);
		return $pdf->download('invoice.pdf');

	} // end method 
	/* =================== Start ShippedToDelivered Methoed =================== */


}
