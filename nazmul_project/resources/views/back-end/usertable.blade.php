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
        <th>Name</th>
        <th>City</th>
        <th>Number</th>
        <th>Comments</th>
        <th>Publications-status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    	@php($i=1)
    	@foreach($nazmuls as $nazmul)
      <tr>
        <td>{{ $i++ }}</td>
        <td>{{$nazmul->your_name}}</td>
        <td>{{$nazmul->your_city}}</td>
        <td>{{$nazmul->your_number}}</td>
        <td>{{$nazmul->your_comment}}</td>
        <td>{{$nazmul->publication_status == 1 ? 'Published' : 'Unpublished'}}</td>
        <td>
        	@if($nazmul->publication_status == 1)
        	<a href="{{URL::to('unpublish',['id'=>$nazmul->id])}}" class="btn btn-success btn-xs">
        		<i class="fa fa-arrow-up"></i>
        	</a>
        	@else
        	<a href="{{URL::to('publish',['id'=>$nazmul->id])}}" class="btn btn-info btn-xs">
        		<i class="fa fa-arrow-down"></i>
        	@endif
        	<a href="{{URL::to('edit-category',['huda'=>$nazmul->id])}}" class="btn btn-warning btn-xs">
        		<i class="fa fa-edit"></i>
        	</a>
        	<a href="{{URL::to('delete-category',['huda'=>$nazmul->id])}}" class="btn btn-danger btn-xs">
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