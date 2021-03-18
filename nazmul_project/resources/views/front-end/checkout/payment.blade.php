
@extends('front-end.master')
@section('title')

Chech-out

@endsection


@section('body')

	<div class="container mt-5">
		<div class="row ">
			<h1 class="text-center text-warning well">Notice:Dear {{Session::get('customerName')}}.You have to give us product via payment method.</h1>
			<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 col-md-offset-2">
      
           {{Form::open(['url'=>'confirm-order','method'=>'POST'])}}
           
              <table class="table table-bordered well">
              	 <tr>
              	 	<th>Cash On Delivary</th>
              	 	<td><input type="radio" name="payment_type" value="Cash"> Cash</td>
              	 </tr>
              	 <tr>
              	 	<th>Paypal</th>
              	 	<td><input type="radio" name="payment_type" value="paypal"> Paypal</td>
              	 </tr>
              	 <tr>
              	 	<th>Bkash</th>
              	 	<td><input type="radio" name="payment_type" value="bkash"> bkash</td>
              	 </tr>
              	  <tr>
              	 	<th></th>
              	 	<td><input type="submit" class="btn btn-success" name="btn" value="Confirm Order"></td>
              	 </tr>
              </table>
            


           {{Form::close()}}
		
	
		</div>

	</div>
</div>

					

@endsection