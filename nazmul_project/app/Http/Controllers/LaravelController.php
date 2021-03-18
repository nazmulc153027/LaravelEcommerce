<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
//use Image;
use DB;
//use DB; for query builder

use Illuminate\Http\Request;

class LaravelController extends Controller
{
   public function index(){
    //$categories = Category::where('publication_status', 1)->get();
    $products   = Product::where('publication_status',1)
                  ->orderBy('id','ASC')
                  //ASC means FIFO DESC means LIFO
                  //->skip(2)
                  ->take(6)
                  ->get();
      //return $products;
   	return view('front-end.home.home',compact('products'));
   }

    public function categorywomen($id){
      //$categories = Category::where('publication_status',1)->get();
      $products= Product::where('your_id',$id)
                                 ->where('publication_status',1)
                                 ->get();
   	return view('front-end.category-women.categorywomen',compact('products'));
     
   }

   public function categorymen(){
   	return view('front-end.category-men.categoryman');
   }

    public function contact(){
   	return view('front-end.mail.mail');
   }


}
