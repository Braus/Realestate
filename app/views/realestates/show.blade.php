@extends('layout.master')


@section('content')
	
	<div class="col-md-9">
		<h1> 
		@if ($realestate->unitNumber)  
			{{ $realestate->unitNumber }}  / 
		@endif
		{{ $realestate->streetNumber }}  {{ $realestate->streetName }}  {{ $realestate->streetSufix }}</h1>
	</div>	
	@foreach($realestate->realestatereview as $rsReview)
		<div class="col-md-3">
			<strong>Price: </strong>${{ $rsReview->cost }}<br />
			<strong>Review: </strong>{{ date('d-m-Y', strtotime($rsReview->created_at)) }}<br />
			<hr>
			
		</div>
	@endforeach	
	<div class="clearfix"></div>
	<div class="image"> 
		@foreach($realestate->realestateimage as $rsImage)
		<img 	src="../img/{{ $rsImage->fileName }}" 
			alt="{{ $realestate->streetNumber }}  {{ $realestate->streetName }}  {{ $realestate->streetSufix }}" 
			class="img-rounded"
			style="max-width:500px;">
		@endforeach
		
	</div>

	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="rs-details">
			@foreach($realestate->realestatereview as $rsReview)
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

@section('sidebar-left')
	

              	<div id="sidebar">
      			<ul class="nav nav-stacked">
                    			<li><h3 class="highlight">Location</h3></li>
                    			<li><div id="map-canvas"></div> Map</li>
                    			
                    			
			</ul>
			<hr />
			@if(Auth::check())
			<h4 class="highlight">Ask <i style="color:#3a87ad;">{{$user->username}}</i> a question</h4>
			{{ Form::open(array('action' => array('UsersController@contactingUser', $realestate->id))) }}
				
				@if($errors->any())
		                            <div class="form-group ">
		                            <a href="#" class="close" data-dismiss="alert">&times;</a>
		                            {{ implode('', $errors->all('<li class="control-label">:message</li>')) }}
		                            </div>
		                          @endif

                			<div class="form-group"> 
                			{{ Form::text('nameUser', '', array('class' => 'form-control', 'placeholder' => 'Name')) }}
                			</div>
                			<div class="form-group"> 
                			{{ Form::text('emailUser', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
                			</div>
                			<div class="form-group"> 
                			{{ Form::textarea('commentUser', '', array('class' => 'form-control', 'placeholder' => 'Comment')) }}
                			</div>

                			{{ Form::submit('Send', array('class' => 'btn btn-success btn-lg btn-block')) }}
                			

                		{{ Form::close() }}
                		@else
                			<h4>Login to email USERNAME </h4>
                		@endif
              	 </div>
			
  
 @stop     		
 <div class="clearfix"></div>
 @section('map')
 		<?php
 		$address = $realestate->unitNumber .' '. $realestate->streetNumber .' '.$realestate->streetName.' '.$realestate->streetSufix.' '.$realestate->suburb;
 		$addressLatLng = urlencode($address);
		  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$addressLatLng."&sensor=true";
		  $xml = simplexml_load_file($request_url) or die("url not loading");
		  $status = $xml->status;
		  if ($status=="OK") {
		      $Lat = $xml->result->geometry->location->lat;
		      $Lon = $xml->result->geometry->location->lng;
		      $LatLng = "$Lat,$Lon";
		   }
 		?>
		
		
      		 <script >
	      		 function initialize() {
			            var myLatlng =  new google.maps.LatLng( {{ $LatLng }});
			            var mapOptions = {
			                    zoom: 14,
			                    center: myLatlng
			            };
			          
			            var map = new google.maps.Map(document.getElementById('map-canvas'),
			              mapOptions);
			        
			            var marker = new google.maps.Marker({
			                position: myLatlng,
			                map:map
			            });
			           
			        }  

			function loadScript() {
			          var script = document.createElement('script');
			          script.type = 'text/javascript';
			          script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&' +
			              'callback=initialize';
			          document.body.appendChild(script);
			        }

			window.onload = loadScript;
		</script>
		<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcnGMdpUJYyWcHYhLl5hDDG-p1BpF0Ir0"></script>-->

@stop