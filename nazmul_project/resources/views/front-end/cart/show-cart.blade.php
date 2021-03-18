

@extends('front-end.master')
@section('title')

Show-cart

@endsection


@section('body')
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary" id="nazmul">{{Session::get('message')}}</h3>

		<div class="content">
			<div class="cart-items">
				<div class="container">
					<h2 class="text-center text-primary">My Shopping Cart</h2>
					<hr class="w-25 bg-dark">
					 <table class="table table-striped">
    <thead>
      <tr class="bg-primary">
        <th>SL NO.</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total Price Tk </th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@php($i=1)
    	@php($sum=0)
    	@foreach($cartproducts as $cartproduct)
      <tr>
        <td>{{$i++}}</td>
        <td>{{$cartproduct->name}}</td>
        <td><img src="{{asset($cartproduct->attributes->image)}}" alt="" height="50" width="50"></td>
        <td>{{$cartproduct->price}}</td>
        <td>
        	{{Form::open(['url'=>'update-cart','method'=>'POST'])}}
               <input type="number" name="quantity" value="{{$cartproduct->quantity}}"  min="1">
                <input type="hidden" name="product_id" value="{{$cartproduct->id}}"  min="1">
               <input type="submit" name="btn" value="update">
        	{{Form::close()}}
        </td>
        <td>{{$total=$cartproduct->price*$cartproduct->quantity}}</td>
        <td>
          <a href="{{URL::to('delete-cart',['id'=>$cartproduct->id])}}" class="btn btn-danger btn-xs" title="delete">
           <i class="fa fa-trash" aria-hidden="true"></i>
        </td>
      </tr>
      <?php $sum=$sum+$total?>
      @endforeach
     
    </tbody>
  </table>
  <hr>
  <table class="table table-bordered">
  	<tr>
  		<th>Item Total Price:</th>
  		<td>{{$sum}}/=</td>
  	</tr>
  	<tr>
  		<th>Vat Total</th>
  		<td>{{$vat=0}}</td>
  	</tr>
  	<tr>
  		<th>Grand/Order Total</th>
  		<td>{{ $orderTotal = $sum+$vat}}</td>
      <?php 
       Session::put('orderTotal', $orderTotal);
      ?>
  	</tr>
  </table>
  <div class="row">
  	<div class="col-xxl-10 col-xl-10 col-lg-10 col-md-6 col-sm-10 col-10 mx-auto">
      @if(Session::get('customerId') && Session::get('shippingId'))
  		<a href="{{url('checkout/payment')}}" class="btn btn-success pull-right">Checkout</a>
      @elseif(Session::get('customerId'))
      <a href="{{url('checkout/shipping')}}" class="btn btn-success pull-right">Checkout</a>
      @else
      <a href="{{url('check-out')}}" class="btn btn-success pull-right">Checkout</a>
      @endif
  		<a href="" class="btn btn-success">Continue Shopping</a>

  	</div>
  </div>
					
				</div>
			</div>
	<!-- checkout -->	
		</div>
	</div>
		</div>
	</div>

</body>
</html>
					

@endsection