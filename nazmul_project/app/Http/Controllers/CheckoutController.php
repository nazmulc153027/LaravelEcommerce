<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\payment;
use App\Models\OrderDetail;
use Cart;
use Mail;
use Session;
use DB;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutInfo(){
       return view('front-end.checkout.checkout-content');
    }


    public function customersignupInfo(Request $request){
      $this->validate($request,[
       'email' => 'required|email|unique:customer,email',

      ]);

       $customer = new Customer();
       $customer->first_name = $request->first_name;
       $customer->last_name = $request->last_name;
       $customer->email = $request->email;
       $customer->password = bcrypt($request->password);
       $customer->phone_number = $request->phone_number;
       $customer->address = $request->address;
       $customer->save();

       $customerId = $customer->id;
       //$customerId = $customer->id; mane customer register korar db te ekta row insert hobe oitai holo $customer->id...
       Session::put('customerId',$customerId);
       Session::put('customerName', $customer->first_name.' '.$customer->last_name);

      $data = $customer->toArray();
       //mail er maddhome $customer er info send korle direct jabena array format e sednd korte hobe.
      Mail::send('front-end.mails.confirmation-mail',$data,function($message) use($data){
         $message->to($data['email']);
         $message->subject('confirmation mail');

       });

      // return $customer;
      //return 'success';
      return redirect('/checkout/shipping');  
    }

    public function customerloginInfo(Request $request){
      //find method shudu matro $id er jonno hoi.
    //search google: php.net for password varify...
     //return bcrypt ($request->password);
      $customer = Customer::where('email',$request->email)->first();
        //return $customer;
      //for password varify
        //$request->? mane holo form er name jegula ace i.e existing..
      if (password_verify($request->password ,$customer->password)) {
        Session::put('customerId',$customer->id);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);
        return redirect('/checkout/shipping');

         } else {
           return redirect('/check-out')->with('message','Wrong password, Please input valid password');
}
    }

    public function CheckoutShippingInfo(){
    	$customer = Customer::find(Session::get('customerId'));
    	//Session::get holo data toler jonno er put holo data raker jonno..
    	return view('front-end.checkout.shipping', compact('customer'));
    }
    public function newshippingInfo(Request $request){
      $shipping = new Shipping();
      $shipping->full_name = $request->full_name;
      $shipping->email = $request->email;
      $shipping->phone_number = $request->phone_number;
      $shipping->address = $request->address;
      $shipping->save();
      Session::put('shippingId',$shipping->id);

      return redirect('/checkout/payment');
    }

    public function checkoutpaymentInfo(){
    	return view('front-end.checkout.payment');
    }

    public function confirmorderInfo(Request $request){
        //return $request->all();
      $paymentType = $request->payment_type;
      if ($paymentType == 'Cash') {
       $order = new Order();
       $order->customer_id =Session::get('customerId');
       $order->shipping_id = Session::get('shippingId');
       $order->order_total = Session::get('orderTotal');
       $order->save();


       $payment = new Payment();
       $payment->order_id = $order->id;
       //$order->id likar mane holo ($order->save();) e jokhon click korbo than $order er ekta row insert hobe . moloto $order->id mane $order->save(); er full row tai bujacche.
       $payment->payment_type = $paymentType;
       $payment->save();

      //orderDetails
       $cartProducts = Cart::getContent();
       foreach ($cartProducts as $cartProduct) {
         $orderDetail = new OrderDetail();
         $orderDetail->order_id = $order->id;
         $orderDetail->product_id = $cartProduct->id;
         $orderDetail->product_name = $cartProduct->name;
         $orderDetail->product_price = $cartProduct->price;
         $orderDetail->product_quantity = $cartProduct->quantity;
         $orderDetail->save();

       }
        Cart::remove(456);
        return redirect('/complete/order');



       
      }elseif ($paymentType == 'paypal') {
      
      }elseif ($paymentType == 'bkash') {
        
      }
    }
    public function completeorderInfo(){
      return 'success';
    }

    public function customerlogoutInfo(){
      Session::forget('customerId');
      Session::forget('customerName');
      return redirect('/');
    }

    public function newcustomerloginInfo(){
      return view('front-end.customer.customer-login');
    }

    
}
