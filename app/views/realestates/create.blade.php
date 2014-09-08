@extends('layout.master')

@section('content')
<h1> Add a Real Estate Review</h1>
@if($errors->any())
				<div class="form-group has-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="control-label">:message</li>')) }}
				</div>
			@endif
<div class="form-horizontal" >
  	<div class="form-group">
		
			

		<div class="clearfix"></div>

		{{ Form::open(array('url' => 'realestates', 'files'=>true)) }}
		
			
			<div class="col-sm-5">

				{{ Form::hidden('id') }}
		
				{{ Form::text('streetNumber',  '' ,array('class' => 'form-control', 'placeholder' => 'Street Number')) }}
			
				{{ Form::text('unitNumber',  '' ,array('class' => 'form-control' , 'placeholder' => 'Unit Number')) }}
			
				{{ Form::text('streetName',  '' ,array('class' => 'form-control' , 'placeholder' => 'Street Name')) }}
			
				{{ Form::text('streetSufix',  '' ,array('class' => 'form-control', 'placeholder' => 'Street Suffix'))}}
		
				{{ Form::select('houseType', array(' ' => 'House Type',
									'apartment' => 'Apartment',
									'unit' => 'Unit',
									'sharehouse' => 'Share House', 
									'house' => 'House',
									'townhouse' => 'Townhouse',
									'other' => 'Other'), 'Select your House Type', array('class' => 'form-control'))}}
			
				{{ Form::text('suburb',  '' ,array('class' => 'form-control', 'placeholder' => 'Suburb'))}}
			
				{{ Form::text('postcode',  '' ,array('class' => 'form-control' , 'placeholder' => 'PostCode'))}}
			
				{{ Form::select('state', array(' ' => 'State',
								'QLD' => 'QLD',
								'SA' => 'SA',
								'WA' => 'WA', 
								'NT' => 'NT',
								'NSW' => 'NSW',
								'VIC' => 'VIC',
								'TAS' => 'TAS'), 'Select your State', array('class' => 'form-control'))}}
				
				{{ Form::file('fileName') }}

			</div>
			<div class="col-sm-5">
				

				{{ Form::text('contractStart',  '' ,array('class' => 'form-control' ,  'id' => 'datepicker', 'placeholder' => 'Contract Started at')) }}

				{{ Form::text('contractEnd',  '' ,array('class' => 'form-control' ,  'id' => 'datepicker', 'placeholder' => 'Contract Ended at')) }}

				{{ Form::text('realestate',  '' ,array('class' => 'form-control' ,'placeholder' => 'Real Estate')) }}

				{{ Form::text('cost',  '' ,array('class' => 'form-control' , 'placeholder' => 'Price')) }} 

				{{ Form::text('reason',  '' ,array('class' => 'form-control' , 'placeholder' => 'Reason of Leaving')) }} 

				{{ Form::textarea('comment',  '' ,array('class' => 'form-control' , 'placeholder' => 'Additional Comments?')) }} 


			</div>
		
		<div class="clearfix"></div> 
		<div class="submit-button"> 
			{{ Form::submit('Submit', array('class' => 'btn btn-primary', 'style' => 'width:200px;'))}}
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop