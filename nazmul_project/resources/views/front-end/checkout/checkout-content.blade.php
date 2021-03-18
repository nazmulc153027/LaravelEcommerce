
@extends('front-end.master')
@section('title')

Chech-out

@endsection


@section('body')

	<div class="container mt-5 well">
		<div class="row">
			<h1 class="text-center text-warning well">You have to login to complete your valuable order.If you are not registered please registered first.</h1>
			<div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-10 col-10 mx-auto">
         <h3 class="text-center text-primary">If you are not registered Please register before.</h3>
         <br>
         {{Form::open(['url' =>'customer-sign-up', 'method' =>'POST'])}}
             <div class="form-group">
             		<input type="text" class="form-control" name="first_name" aria-describedby="emailHelp" placeholder="your first name">
             </div>

             
             	<div class="form-group">
             		<input type="text" class="form-control" name="last_name" aria-describedby="emailHelp" placeholder="your last name">
             </div>

            <div class="form-group">
             	
             		<input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com">
             </div>

             <div class="form-group">
             	
             		<input type="text" class="form-control" name="password" aria-describedby="emailHelp" placeholder="your password">
             </div>

             <div class="form-group">
             	
             		<input type="number" id="mytextarea" class="form-control"  name="phone_number"  placeholder="contact number">	
             </div>

             <div class="form-group">
             		<textarea name="address" placeholder="your address" class="form-control"></textarea>
             </div>
             <div class="form-group">
             	
             		<input type="submit" id="mytextarea" class="form-control btn btn-primary"  name="btn"  value="Register">	
             </div>



         {{Form::close()}}
		
	
		</div>

		<div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-10 col-10 pull-right well">
		  <h3 class="text-center text-primary">Already Registered? Login Here!</h3>
              <br>
              <h5 class="text-center text-warning">{{Session::get('message')}}</h5>
		  <br>
		  {{Form::open(['url'=>'customer-login', 'method'=>'POST'])}}
		    <div class="form-group">
             	
             		<input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@gmail.com">
             </div>

             <div class="form-group">
             	
             		<input type="text" class="form-control" name="password" aria-describedby="emailHelp" placeholder="your password">
             </div>
             <div class="form-group">
             	
             		<input type="submit" id="mytextarea" class="form-control btn btn-success"  name="btn"  value="Login">	
             </div>


		  {{Form::close()}}
		</div>
	</div>
</div>

					

@endsection