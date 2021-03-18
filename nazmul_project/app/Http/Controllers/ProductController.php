<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
//use Image;
use DB;
//use DB; for query builder

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function addproductInfo(){
    	$categories = Category::where('publication_status', 1)->get();
    	$brands     = Brand::where('publication_status', 1)->get();
    	//একটি ডাটা তোলার জন্ন হলে first আর একাধিক ডাটা তোলার জন্ন হলে get.
    	//return view('back-end.product-item.add-product',[
    		//'categories'=> $categories,
    		//'brands'    => $brands,
    	//]);
      return view('back-end.product-item.add-product',compact(['categories','brands']));
      
    }

    //According to Laravel standard practice we do not keep function more than 10 line..
    protected function productInfovalidate($request){
      $this->validate($request,[
        'product_name'=> 'required',
        'product_price'=> 'required',
        'product_quantity'=>'required',
        'product_image'=>'required',
        'publication_status'=>'required'

      ]);
    }

    protected function productImageUpload($request){
      
      $productImage = $request->file('product_image');
      //here file a kind of method.
      $imageName = $productImage->getClientOriginalExtension(); 
      $directory = 'product-images/';
      //public folder er moddhe product-images namer ekta folder create hobe.
      $imageUrl  =  $directory.$imageName;
      //db te save hower jonno..
      $productImage->move($directory,$imageName);
      
      return  $imageUrl;
    }

    //Not supported intervention package...
      //$productImage = $request->file('product_image');
      //$fileType = $productImage->getClientOriginalExtension();
      //$imageName = $request->product_name.'.'.$fileType;
      //$directory = 'product-images/';
       //$imageUrl  =  $directory.$imageName;
      //Image::make($productImage)->resize(200,200)->save($imageUrl);
      //return  $imageUrl;



    protected function productData($request, $imageUrl){
     $product = new Product();
     $product->your_id = $request->your_id;
     $product->brand_id = $request->brand_id;
     $product->product_name = $request->product_name;
     $product->product_price = $request->product_price;
     $product->product_quantity = $request->product_quantity;
     $product->short_description = $request->short_description;
     $product->long_description = $request->long_description;
     $product->product_image = $imageUrl;
     $product->publication_status = $request->publication_status;
     $product->save();

    }

    public function newproductInfo(Request $request){
      $this->productInfovalidate($request);
      $imageUrl=$this->productImageUpload($request);
      //function jokhon konu kichu return kore tokhon jekhan theke function ta call koreci sekhane abar bose ekane $imageUrl ta function ja return kora hoyece..
      $this->productData($request, $imageUrl);
      
      
     return redirect('/addproduct')->with('message','Product Information save successfully');


    }
    public function producttableInfo(){
      //$products= Product::all();
      $products=DB::table('products')
      ->join('categories','products.your_id','=','categories.id')
      ->join('brands','products.brand_id','=','brands.id')
      ->select('products.*','categories.your_name','brands.brand_name')
      ->get();
      //return $products;
      return view('back-end.product-item.producttable',compact('products'));
    }

    public function productdetailsInfo($id){
      $product = Product::find($id);
      return view('front-end.products.product-details',compact('product'));
    }


    public function editproductInfo($id){
       $product=Product::find($id);
       $categories = Category::where('publication_status', 1)->get();
       $brands     = Brand::where('publication_status', 1)->get();
       return view('back-end.product-item.edit-product',compact(['product','categories','brands']));
    }



    public function productInfoUpdate($product,$request,$imageUrl=null){
     //$product = new Product();
     $product->your_id = $request->your_id;
     $product->brand_id = $request->brand_id;
     $product->product_name = $request->product_name;
     $product->product_price = $request->product_price;
     $product->product_quantity = $request->product_quantity;
     $product->short_description = $request->short_description;
     $product->long_description = $request->long_description;
     if ($imageUrl) {
        $product->product_image = $imageUrl;
     }
     //$imageUrl=null and if deyar mane holo jodi user img update kore na hole null..
     $product->publication_status = $request->publication_status;
     $product->save();
    }

    public function updateproductInfo(Request $request){
      //return $request->all();
      $productImage = $request->file('product_image');
      //file is a method of Request class
      //echo $productImage->getClientOriginalName();
      $product = Product::find($request->product_id);

      if ($productImage) {
        unlink($product->product_image);
        //jodi new image update then ager img ta remove hoye jabe tai unlink use kora hoyece.
        $imageUrl=$this->productImageUpload($request);
        $this->productInfoUpdate($product, $request, $imageUrl);
       
      }else{
        $this->productData($product, $request);
      }

       return redirect('/producttable')->with('message','Product Information updated successfully');
      
    }
}







 




