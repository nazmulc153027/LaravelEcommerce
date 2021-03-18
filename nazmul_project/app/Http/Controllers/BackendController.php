<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
//for query builder...



class BackendController extends Controller
{
   public function user(){
     return view('back-end.userform');
   	
   }


   public function usertable(){
    //show data in front-end usertable.php
    //ডাটাবেজে ডাটা তুলে আনার জন্ন
      //$categories হল ভেরিয়েবল আর $categories = Category::all(); এটা মানে ডাটাবেজ থেকে সব ডাটা তুলে আনার জন্ন।
    $categories = Category::all();
     return view('back-end.usertable',['nazmuls'=>$categories]);
     //'nazmuls' হল index function এটা যেকোনো নামের হতে পারে। $categories কে nazmuls index এর ভিতর রাখা হয়েছে। nazmuls/categogries কে @nazmuls/@categories দিয়ে @foreach এর ভিতর লিখতে হবে।
    
   }



   public function newcategoryinfo(Request $request){
   	//Request হল class আর $request হল অই class এর object.
      //return $request->all();  ---for showing json format
   	//...Elequent ORM 1st method...

   	//$nazmul = new Category();
   	//$nazmul->your_name  = $request->your_name;
   	//$nazmul->your_city  = $request->your_city;
   	//$nazmul->your_number  = $request->your_number;
   	//$nazmul->your_comment  = $request->your_comment;
   	//$nazmul->publication_status  = $request->publication_status;
   	//$nazmul->save();

    //...Elequent ORM 2st method...
   	//Category::create($request->all());


   	//...Query builder method...

   	DB::table('categories')->insert([
       'your_name'           => $request->your_name,
       'your_city'           => $request->your_city,
       'your_number'         => $request->your_number,
       'your_comment'        => $request->your_comment,
       'publication_status'  => $request->publication_status
   	]);

     //return 'Data Inserted Successfully';
   	return redirect('/userform')->with('message','Data Inserted Successfully');

   }

   public function editcategoryinfo($huda){
    $nazmul = Category::find($huda);
    return view('back-end.edit-category',compact('nazmul'));
       
   }

   public function updatecategoryinfo(Request $request){
      $nazmul = Category::find($request->your_id);
      $nazmul->your_name = $request->your_name; 
      $nazmul->your_city = $request->your_city; 
      $nazmul->your_number = $request->your_number; 
      $nazmul->your_comment = $request->your_comment; 
      $nazmul->publication_status = $request->publication_status;
      $nazmul->save(); 
      return redirect('/usertable')->with('message','Data Updated Successfully');
   }

   public function deletecategoryinfo($huda){
    $nazmul = Category::find($huda);
    $nazmul->delete();
    return redirect('/usertable')->with('message','Data delete Successfully');
   }



   public function unpublishcategory($id){
      //return $id;
    $nazmul = Category::find($id);
    $nazmul->publication_status=0;
    $nazmul->save();
   // return $nazmul;
    return redirect('/usertable')->with('message','Data Unpublish Successfully');
   }

   public function publishcategory($id){
      //return $id;
    $nazmul = Category::find($id);
    $nazmul->publication_status=1;
    $nazmul->save();
    return redirect('/usertable')->with('message','Data Publish Successfully');
   }




   }

   
