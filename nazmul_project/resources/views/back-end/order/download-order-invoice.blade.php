<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 4 Example</title>
  <meta charset="utf-8">
  
</head>
<body class="">


  <div class="container ">
  <div class="card ml-5">
<div class="card-header">
 <h3 class="text-center text-primary">Customer Invoice</h3>

</div>
<div class="card-body">
<div class="row">
<div class="col-xxl-4 col-xl-5 col-md-5 col-sm-8 col-8">
<h6 class="mb-3"></h6>
<div>
<strong>Shipping Info</strong>
</div>
<div>{{$shipping->full_name}}</div>
<div>{{$shipping->email}}</div>
<div>{{$shipping->phone_number}}</div>
<div>{{$shipping->address}}</div>
</div>

<div class="col-xxl-4 col-xl-5 col-md-5 col-sm-8 col-8">
<h6 class="mb-3"></h6>
<div>
<strong>Billing Info</strong>
</div>
<div>{{$customer->first_name.' '.$customer->last_name}}</div>
<div>{{$customer->email}}</div>
<div>{{$customer->phone_number}}</div>

</div>

<div class="col-xxl-4 col-xl-4 col-md-4 col-sm-8 col-8">
<h6 class="mb-3"></h6>
<table class="table table-bordered">
  <tr>
    <th>#Invoice</th>
    <td>0000{{$order->id}}</td>
  </tr>
  <tr>
    <th>Date</th>
    <td>{{$order->created_at}}</td>
  </tr>
  <tr>
    <th>Amount Due</th>
    <td>TK:{{$order->order_total}}/=</td>
  </tr>
</table>

</div>

</div>


<div class="table-responsive-sm mt-5">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>


<th class="right">Rate</th>
  <th class="center">Quantity</th>
<th class="right">Total Price</th>
</tr>
</thead>
<tbody>
  @php($i=1)
  @php($sum=0)
  @foreach($orderDetails as $orderDetail)
<tr>
<td class="center">{{$i++}}</td>
<td class="left strong">{{$orderDetail->product_name}}</td>


<td class="right">TK:{{$orderDetail->product_price}}</td>
  <td class="center">{{$orderDetail->product_quantity}}</td>
<td class="right">TK:{{$total=$orderDetail->product_price*$orderDetail->product_quantity}}</td>
</tr>
<?php $sum=$sum+$total?>
@endforeach

</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>

<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">
<strong>TK:{{$sum}}</strong>
</td>
</tr>
</tbody>
</table>

</div>

</div>

</div>
</div>
</div>


</body>
</html>