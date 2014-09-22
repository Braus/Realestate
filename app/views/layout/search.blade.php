@extends('layout.master')

@section('content')
		<h1>Search Results</h1>
	
		@if($search->count())
		@foreach($search as $re)
			<div class="panel panel-info">
	    			<div class="panel-heading">
		    			<div class="panel-title">
				    		
				    		<h2> <a href="realestates/{{$re->id}}"> 
				    			@if($re->unitNumber)
				    			  	{{ $re->unitNumber }} / 
				    			@endif
							{{ $re->streetNumber }} {{ $re->streetName }}  {{ ucwords($re->streetSufix) }}</a></h2>
				    	</div>	
				 </div>   	
		    		<div class="panel-body">
			    		<div class="col-md-4">
			    		@foreach ($re->realestateimage as $reImage)
			    			<img src="img/{{$reImage->fileName}}" width="260" height="200" />
			    		@endforeach
			    		</div>
			    		<div class="col-md-8">
			    		@foreach ($re->realestatereview as $reReview)
			    			<h3>$ {{ number_format($reReview->cost,2) }}</h3>
			    			<p><strong>Type: </strong>{{ ucwords($re->houseType) }}</p>
			    			<p><strong>Last Updated : </strong>{{ Carbon::createFromTimestamp(strtotime($re->updated_at))->diffForHumans() }}</p>
			    			<p><strong>Real Estate: </strong>{{ $reReview->realestate }}</p>
			    		@endforeach	

			    			{{HTML::link('realestates/'.$re->id, 'Read More')}}

			    		</div>
			    	</div>
			 </div> 

		@endforeach
		@else

		<h4> Sorry, could not find a Real Estate for you  </h4>

		@endif
@stop