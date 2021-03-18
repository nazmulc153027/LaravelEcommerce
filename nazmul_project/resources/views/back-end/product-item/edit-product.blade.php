@extends('master')
@section('title')

Customer Invoice

@endsection


@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>User Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row ">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto mt-5 bg-dark text-white p-3">
		        <h1 class="text-center">Please Fill This Input.</h1>
				<hr class="w-50 bg-white ">
             <h3 class="text-center text-primary">{{Session::get('message')}}</h3>

             {{Form::open(['url' => 'update-product', 'Method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data','name'=>'editProductForm'])}}
             <div class="form-group">
             	<label class="col-sm-10">Category Name:</label>
             	<div class="col-sm-10">
             		<div class="input-group mb-3">
                      <select class="form-control" name="your_id">
                        <option>Select Category Name</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->your_name}}</option>
                         @endforeach
                      </select>
                      
                    </div>
                  
             		<span class="text-danger">{{$errors->has('your_id') ? $errors->first('your_id') : ''}}</span>
             	</div>
             </div>
             <div class="form-group">
             	<label class="col-sm-10">Brand Name:</label>
             	<div class="col-sm-10">
             		<div class="input-group mb-3">
                      <select class="form-control" name="brand_id">
                        <option>Select Brand Name</option>
                        @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                        @endforeach
                      </select>
                      
                    </div>
             
             		<span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
             	</div>
             </div>

             <div class="form-group">
             	<label class="col-sm-10">Product Name:</label>
             	<div class="col-sm-10">
             		<input type="text" class="form-control" value="{{$product->product_name}}" name="product_name" aria-describedby="emailHelp" placeholder="your product name">

                    <input type="hidden" class="form-control" value="{{$product->id}}" name="product_id" aria-describedby="emailHelp" placeholder="your product name">
              
                    <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
             	</div>
             </div>

              <div class="form-group">
             	<label class="col-sm-10">Product Price:</label>
             	<div class="col-sm-10">
             		<input type="number" class="form-control" value="{{$product->product_price}}" name="product_price" aria-describedby="emailHelp" placeholder="your product price">
         
                    <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
             	</div>
             </div>

            <div class="form-group">
             	<label class="col-sm-10">Product Quantity:</label>
             	<div class="col-sm-10">
             		<input type="text" class="form-control" value="{{$product->product_quantity}}" name="product_quantity" aria-describedby="emailHelp" placeholder="your product quantity">
                   
                    <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
             	</div>
             </div>

             <div class="form-group">
             	<label class="col-sm-10">Short Description:</label>
             	<div class="col-sm-10">
             		<input type="text" class="form-control" value="{{$product->short_description}}" name="short_description" aria-describedby="emailHelp" placeholder="your short description">
               
                    <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
             	</div>
             </div>

             <div class="form-group">
             	<label class="col-sm-10">long Description:</label>
             	<div class="col-sm-10">
             		<input type="text" id="mytextarea" class="form-control"  name="long_description" value="{{$product->long_description}}"  placeholder="your long description">
                  
                    <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
             	</div>
             </div>

             <div class="form-group">
             	<label class="col-sm-10">Product Image:</label>
             	<div class="col-sm-10">
             		<input type="file" class="form-control" name="product_image" aria-describedby="emailHelp" accept="image/*"/>
                   <br>
                   <img src="" alt="{{asset($product->product_image)}}" height="80" width="80">
                    <span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ''}}</span>
             	</div>
             </div>



            
             <div class="form-check">
                        <label> <input class="form-check-input" type="radio" name="publication_status" {{$product->publication_status == 1 ?  'checked' : ''}} value="1">Published</label>
                       </div>
                           <div class="form-check">
                              <label><input class="form-check-input" type="radio" name="publication_status" {{$product->publication_status == 0 ?  'checked' : ''}} value="0">Unpublished</label>  
                            </div>
                        
                            <span class="text-danger">
                            {{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                     <button type="submit" class="btn btn-warning mb-5 float-right w-25">Product Update Information</button>
             
             
             {{Form::close()}}
				
			</div>
		</div>
	</div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

     <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
<script>
document.forms['editProductForm'].elements['your_id'].value='{{$product->your_id}}';
document.forms['editProductForm'].elements['brand_id'].value='{{$product->brand_id}}';
</script>

</body>
</html>
@endsection