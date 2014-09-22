@extends('layout.dashboard')


@section('content')
	
	{{ HTML::link(URL::action('AdminsController@index', array(Auth::user()->username)),  'Back', array('class' => 'btn btn-warning btn-lg')) }}
	<hr>
	<div class="clearfix"></div>
	 @foreach ($realestate as $re ) 
	<div class="col-md-9">
		<h1> 
		@if ($re->unitNumber)  
			{{ $re->unitNumber }}  / 
		@endif
		{{ $re->streetNumber }}  {{ $re->streetName }}  {{ $re->streetSufix }}</h1>
	</div>	
	@endforeach
	@foreach($re->realestatereview as $rsReview)
		<div class="col-md-3">
			<strong>Price: </strong>${{ $rsReview->cost }}<br />
			<strong>Review: </strong>{{ date('d-m-Y', strtotime($rsReview->created_at)) }}<br />
			<hr>
			
		</div>
	@endforeach	
	<div class="clearfix"></div>
	<div class="image"> 
		@foreach($re->realestateimage as $rsImage)
		<img 	src="../../../img/{{ $rsImage->fileName }}" 
			alt="{{ $re->streetNumber }}  {{ $re->streetName }}  {{ $re->streetSufix }}" 
			class="img-rounded"
			style="max-width:500px;">
		@endforeach
		
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="rs-details">
			@foreach($re->realestatereview as $rsReview)
				<h3>Details</h3>
				<strong>Real Estate: </strong>{{ $rsReview->realestate }}<br>
	          			<strong>Lease Started:</strong>  {{ date('d-m-Y',  strtotime($rsReview->contractStart)) }}<br>
	          			<strong>Lease Ended:</strong>  {{ date('d-m-Y',  strtotime($rsReview->contractEnd)) }}<br>
				<h3>Reason to move out:</h3><p>{{ $rsReview->reason }}</p>
				<h3>Comments</h3>
				<p>{{ $rsReview->comment }}</p>

				
				
				
				
			@endforeach	
			</div>
		</div>
	</div>	


	

<div class="clearfix"></div> 

@stop

