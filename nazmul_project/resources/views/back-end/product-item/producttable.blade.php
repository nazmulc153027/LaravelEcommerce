@extends('master')
@section('title')

Customer Invoice

@endsection


@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>User Information</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary" id="nazmul">{{Session::get('message')}}</h3>
				<table class="table">
    <thead>
      <tr>
        <th>SL.No</th>
        <th>Category Name</th>
        <th>Brand Name</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Product Image</th>
        <th>Publications-status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@php($i=1)
    	@foreach($products as $product)
      <tr>
      	<td>{{$i++}}</td>
        <td>{{$product->your_name}}</td>
        <td>{{$product->brand_name}}</td>
        <td>{{$product->product_name}}</td>
        <td>{{$product->product_price}}</td>
        <td>{{$product->product_quantity}}</td>
        <td>
        	<img src="{{asset($product->product_image)}}" alt="" height="150" width="150">
        </td>
        <td>{{$product->publication_status}}</td>
        <td>
          <a href="" class="btn btn-success btn-xs" title="view details">
            <i class="fa fa-search"></i>
          </a>
          <a href="" class="btn btn-info btn-xs" title="published">
            <i class="fa fa-arrow-up"></i>
          <a href="{{url('edit-product',['id'=>$product->id])}}" class="btn btn-warning btn-xs" title="edit">
            <i class="fa fa-edit"></i>
          </a>
          <a href="" class="btn btn-danger btn-xs" title="delete">
            <i class="fa fa-trash"></i>
          </a>
        </td>
         
      </tr> 
         @endforeach
    </tbody>
  </table>
				
			</div>
		</div>
	</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
   $('#nazmul').click(function() {
      $(this).text('');
   });
  });
</script>
</body>
</html>
@endsection