<?php

namespace App\Http\Controllers;
//use App\Models\Category;
//use App\Models\Brand;
use App\Models\Product;
use Cart;
//use Image;
//use DB;
//use DB; for query builder

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocartInfo(Request $request){
        //return $request->all();
    	 //return $request->quantity;
    	//show json format
    	 //return Product::find($request->product_id);
          
    	 $product = Product::find($request->product_id); //from DB
    	 //return $product->id;

    	 //return $product->id mane product no ta kotho seta show korbe
    	 //$request->product_id (name field e jeta thakbe seta request e dite hobe) mane db er single row er moddhe ja ache ta shob show korbe
    	
    	//(search:url->https://www.youtube.com/watch?v=SZ6-x1NfB1c)
    	Cart::add([
         'id' =>$request->product_id, // inique row ID
         'name' => $product->product_name,
         'price' => $product->product_price,
         'quantity' =>$request->quantity,
         'attributes' =>[
         'image'      => $product->product_image,	
         ]
]);


    	return redirect('/show-cart');
    }

    public function showcartInfo(){
    	$cartproducts=Cart::getContent();
    	//return $cartproducts;
    	return view('front-end.cart.show-cart',compact('cartproducts'));
    }

    public function deletecartInfo($id){
    	Cart::remove($id);
    	return redirect('/show-cart');
    }

    public function updatecartInfo(Request $request){

       Cart::update($request->product_id, array(
       'quantity' =>$request->quantity,
     ));
        return redirect('/show-cart');

    }
}
