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
      <tr class="bg-success">
        <th>SL.No</th>
        <th>Customer Name</th>
        <th>Order Total</th>
        <th>Order Date</th>
        <th>Order Status</th>
        <th>Payment Type</th>
        <th>Payment Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@php($i=1)
    	@foreach($orders as $order)
      <tr>
        <td>{{$i++}}</td>
      	<td>{{$order->first_name.' '.$order->last_name}}</td>
      	<td>{{$order->order_total}}</td>
      	<td>{{$order->created_at}}</td>
      	<td>{{$order->order_status}}</td>
      	<td>{{$order->payment_type}}</td>
      	<td>{{$order->payment_status}}</td>
      	
      	<td>
           <a href="{{URL::to('view-order-details',['id'=>$order->id])}}" class="btn btn-success " title="view order details">
            <i class="fa fa-search"></i>
          </a>
          <a href="{{URL::to('view-order-invoice',['id'=>$order->id])}}" class="btn btn-info" title="view order invoice">
            <i class="fa fa-search-plus"></i>
          <a href="{{url('download-order-invoice',['id'=>$order->id])}}"class="btn btn-warning" title="download order invoice">
            <i class="fa fa-download"></i>
          </a>
          <a href="" class="btn btn-primary" title="edit order">
            <i class="fa fa-pencil"></i>
          </a> 
          <a href="" class="btn btn-danger " title="delete order">
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