
@extends('front-end.master')
@section('title')

Chech-out

@endsection


@section('body')

	<div class="container mt-5">
		<div class="row ">
			<h1 class="text-center text-warning well">Notice:Dear {{Session::get('customerName')}}.You have to give us product shipping info to complete your valuable order.If your billing info & shipping info are same then press the button Save Shipping Info.</h1>
			<div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 col-md-offset-2">
         <h3 class="text-center text-primary">Your Shipping Information Goes Here...</h3>
         <br>
         {{Form::open(['url'=>'new-shipping', 'method'=>'POST'])}}
             <div class="form-group">
             		<input type="text" class="form-control" value="{{$customer->first_name.' '.$customer->last_name}}" name="full_name" aria-describedby="emailHelp" placeholder="your full name">
             </div>

            
            <div class="form-group">
             	
             		<input type="text" class="form-control" value="{{$customer->email}}" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com">
             </div>

             <div class="form-group">
             	
             		<input type="number" id="mytextarea" value="{{$customer->phone_number}}" class="form-control"  name="phone_number"  placeholder="contact number">	
             </div>

             <div class="form-group">
             		<textarea name="address" placeholder="your address" class="form-control">{{$customer->address}}</textarea>
             </div>
             <div class="form-group">
             	
             		<input type="submit" id="mytextarea" class="form-control btn btn-primary"  name="btn"  value="Save Shipping Info">	
             </div>



         {{Form::close()}}
		
	
		</div>

	</div>
</div>

					

@endsection