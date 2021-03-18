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
         <h3 class="text-center text-primary well">Customer Info For This Order</h3>
				<table class="table table-bordered">
                  <tr>
                  	<th>Customer Name</th>
                  	<td>{{$customer->first_name.''.$customer->last_name}}</td>
                  </tr>
                  <tr>
                  	<th>Customer Email</th>
                  	<td>{{$customer->email}}</td>
                  </tr>
                  <tr>
                  	<th>Customer Number</th>
                  	<td>{{$customer->phone_number}}</td>
                  </tr>
                  <tr>
                  	<th>Customer Address</th>
                  	<td>{{$customer->address}}</td>
                  </tr>
                </table>
				
			</div>
		</div>

		<div class="row">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary well">Order Info For This Order</h3>
				<table class="table table-bordered">
                  <tr>
                  	<th>Order No</th>
                  	<td>{{$order->id}}</td>
                  </tr>
                  <tr>
                  	<th>Order Total</th>
                  	<td>{{$order->order_total}}</td>
                  </tr>
                  <tr>
                  	<th>Order Status</th>
                  	<td>{{$order->order_status}}</td>
                  </tr>
                  <tr>
                  	<th>Order Date</th>
                  	<td>{{$order->created_at}}</td>
                  </tr>
                </table>
				
			</div>
		</div>

		<div class="row">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary well">Shipping Info For This Order</h3>
				<table class="table table-bordered">
                  <tr>
                  	<th>Full Name</th>
                  	<td>{{$shipping->full_name}}</td>
                  </tr>
                  <tr>
                  	<th>Customer Email</th>
                  	<td>{{$shipping->email}}</td>
                  </tr>
                  <tr>
                  	<th>Customer Number</th>
                  	<td>{{$shipping->phone_number}}</td>
                  </tr>
                  <tr>
                  	<th>Customer Address</th>
                  	<td>{{$shipping->address}}</td>
                  </tr>
                </table>
				
			</div>
		</div>

		<div class="row">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary well">Payment Info For This Order</h3>
				<table class="table table-bordered">
                  <tr>
                  	<th>Payment Type</th>
                  	<td>{{$payment->payment_type}}</td>
                  </tr>
                  <tr>
                  	<th>Payment Status</th>
                  	<td>{{$payment->payment_status}}</td>
                  </tr>
                 
                </table>
				
			</div>
		</div>

		<div class="row">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary">Product Info For This Order</h3>
				<table class="table">
    <thead>
      <tr class="bg-success">
        <th>SL.No</th>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Quantity</th>
        <th>Total price</th>
      </tr>
    </thead>
    <tbody>
    	@php($i=1)
      	@foreach($orderDetails as $orderDetail)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$orderDetail->product_id}}</td>
        <td>{{$orderDetail->product_name}}</td>
        <td>TK:{{$orderDetail->product_price}}</td>
        <td>{{$orderDetail->product_quantity}}</td>
        <td>TK:{{$orderDetail->product_price*$orderDetail->product_quantity}}</td>
        
      	
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