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
				<form action="{{url('new-category')}}" method="POST">
           {{csrf_field ()}}
                    <div class="">
                      <label for="Name" class="form-label">Name
                      :</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="your_name" placeholder="Enter your name">
                    </div>
                     <div class="">
                      <label for="Location" class="form-label">Location
                      :</label>
                      <input type="text" class="form-control" id="Location" aria-describedby="Location" name="your_city" placeholder="Enter your city">
                    </div>
                     <div class="">
                      <label for="Contact" class="form-label">Contact
                      :</label>
                      <input type="text" class="form-control" id="Contact" aria-describedby="Location" name="your_number" placeholder="Contact number">
                    </div>
                    <div class="form-floating">
                       <label for="floatingTextarea">Comments
                       :</label>
                       <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" name="your_comment"></textarea>
                     </div>
                     <label for="floatingTextarea" class="mt-3">Publication status
                     :</label>
                     <div class="form-check">
                        <label> <input class="form-check-input" type="radio" name="publication_status" value="1">Published</label>
                       </div>
                           <div class="form-check">
                              <label><input class="form-check-input" type="radio" name="publication_status" value="0">Unpublished</label>  
                            </div>
                     <button type="submit" class="btn btn-warning mb-5 float-right w-25">Save Information</button>
                  </form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
@endsection