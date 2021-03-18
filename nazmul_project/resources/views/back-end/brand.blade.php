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
             {{Form::open(['url' => 'new-brand', 'Method'=>'POST', 'class'=>'form-horizontal'])}}
             <div class="form-group">
             	<label class="col-sm-10">Brand Name:</label>
             	<div class="col-sm-10">
             		<input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp" placeholder="your brand name">
             		<span class="text-danger">{{$errors->has('brand_name') ? $errors->first('brand_name') : ''}}</span>
             	</div>
             </div>
             <div class="form-group">
             	<label class="col-sm-10">Brand Email:</label>
             	<div class="col-sm-10">
             		<input type="email" class="form-control" name="brand_email" aria-describedby="emailHelp" placeholder="your brand email">
                    <span class="text-danger">{{$errors->has('brand_email') ? $errors->first('brand_email') : ''}}</span>
             	</div>
             </div>
             <div class="form-group">
             	<label class="col-sm-10">Brand Description:</label>
             	<div class="col-sm-10">
             		<input type="text" class="form-control" name="brand_description" aria-describedby="emailHelp" placeholder="your brand description">
                    <span class="text-danger">{{$errors->has('brand_description') ? $errors->first('brand_description') : ''}}</span>
             	</div>
             </div>
             <div class="form-check">
                        <label> <input class="form-check-input" type="radio" name="publication_status" value="1">Published</label>
                       </div>
                           <div class="form-check">
                              <label><input class="form-check-input" type="radio" name="publication_status" value="0">Unpublished</label>  
                            </div>
                            <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                     <button type="submit" class="btn btn-warning mb-5 float-right w-25">Save Information</button>
             
             
             {{Form::close()}}
				
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
@endsection