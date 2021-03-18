<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use DB;
//use DB; for query builder

class BrandController extends Controller
{
    public function brandcategory(){
        return view('back-end.brand');
    }

    public function newbrand(Request $request){
       $this->validate($request,[
       	'brand_name'=> 'required |alpha |max:15|min:2',
       	'brand_email'=> 'required |email|max:255',
       	'brand_description'=> 'required',
       	'publication_status'=> 'required'

       ]);
       $nazmul = new Brand();
       $nazmul->brand_name = $request->brand_name;
       $nazmul->brand_email = $request->brand_email;
       $nazmul->brand_description = $request->brand_description;
       $nazmul->publication_status = $request->publication_status;
       $nazmul->save();
       return redirect('/brand-category')->with('message','Brand information save successfully');
    }
}



