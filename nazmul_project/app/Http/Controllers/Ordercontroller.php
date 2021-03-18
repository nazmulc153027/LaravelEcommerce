<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Customer;
use App\Models\payment;
use App\Models\Shipping;
use App\Models\orderDetail;
use DB;
use PDF;

use Illuminate\Http\Request;


class Ordercontroller extends Controller
{
    public function ordermanagementInfo(){
    $orders = DB::table('orders')
        ->join('customers','orders.customer_id','=','customers.id')
    	->join('payments', 'orders.id','=','payments.id')
    	->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
       
    	->get();
     
       return view('back-end.management.order-management',compact('orders'));
    }

    public function vieworderdetailsInfo($id){
    	$order = Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);
    	$payment  = Payment::where('order_id', $order->id)->first();    
    	$orderDetails=OrderDetail::where('order_id',$order->id)->get();  
    	return view('back-end.order.view-order-details',compact(['order','customer','shipping','payment','orderDetails']));
    }

    public function vieworderinvoiceInfo($id){
    	$order = Order::find($id);
    	$customer = Customer::find($order->customer_id);
    	$shipping = Shipping::find($order->shipping_id);
    	//$payment  = Payment::where('order_id', $order->id)->first();    
    	$orderDetails=OrderDetail::where('order_id',$order->id)->get();  
    	return view('back-end.order.view-order-invoice',compact(['order','customer','shipping','orderDetails']));
    }

    public function downloadinvoiceInfo($id){
        //jekhono page er moddhe db teke data gula front end e dekhate chile variable dhore find method ta use korte hobe...
        $order = Order::find($id);
        $customer = Customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        //$payment  = Payment::where('order_id', $order->id)->first();    
        $orderDetails=OrderDetail::where('order_id',$order->id)->get();

        $pdf = PDF::loadView('back-end.order.download-order-invoice',compact(['order','customer','shipping','orderDetails']));
        return $pdf->stream('invoice.pdf');
    }
}
