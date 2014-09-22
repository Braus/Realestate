@extends('layout.dashboard')

@section('content')
<h1> Edit Real Estate</h1>
@if($errors->any())
				<div class="form-group has-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="control-label">:message</li>')) }}
				</div>
			@endif
<div class="form-horizontal" >
  	<div class="form-group">
		
			

		<div class="clearfix"></div>

		{{ Form::model($realestate, array('method' => 'PATCH', 'action' => array('AdminsController@update', $realestate->id)))}}
		
			
			<div class="col-sm-5">

				{{ Form::hidden('id') }}
		
				{{ Form::text('streetNumber',  Input::old('streetNumber') ,array('class' => 'form-control', 'placeholder' => 'Street Number')) }}
			
				{{ Form::text('unitNumber',   Input::old('unitNumber') ,array('class' => 'form-control' , 'placeholder' => 'Unit Number')) }}
			
				{{ Form::text('streetName',   Input::old('streetName') ,array('class' => 'form-control' , 'placeholder' => 'Street Name')) }}
			
				{{ Form::text('streetSufix',   Input::old('streetSufix') ,array('class' => 'form-control', 'placeholder' => 'Street Suffix'))}}
		
				{{ Form::select('houseType', array(' ' => 'House Type',
									'apartment' => 'Apartment',
									'unit' => 'Unit',
									'sharehouse' => 'Share House', 
									'house' => 'House',
									'townhouse' => 'Townhouse',
									'other' => 'Other'), Input::old('houseType'), array('class' => 'form-control'))}}
			
				{{ Form::text('suburb',   Input::old('suburb') ,array('class' => 'form-control', 'placeholder' => 'Suburb'))}}
			
				{{ Form::text('postcode',   Input::old('postcode') ,array('class' => 'form-control' , 'placeholder' => 'PostCode'))}}
			
				{{ Form::select('state', array(' ' => 'State',
								'QLD' => 'QLD',
								'SA' => 'SA',
								'WA' => 'WA', 
								'NT' => 'NT',
								'NSW' => 'NSW',
								'VIC' => 'VIC',
								'TAS' => 'TAS'), Input::old('state'), array('class' => 'form-control'))}}
				
				{{ Form::file('fileName') }}

			</div>
			<div class="col-sm-5">
				

				{{ Form::text('contractStart',   Input::old('contractStart') ,array('class' => 'form-control' ,  'id' => 'datepicker', 'placeholder' => 'Contract Started at')) }}

				{{ Form::text('contractEnd',   Input::old('contractEnd') ,array('class' => 'form-control' ,  'id' => 'datepicker', 'placeholder' => 'Contract Ended at')) }}

				{{ Form::text('realestate',   Input::old('realestate') ,array('class' => 'form-control' ,'placeholder' => 'Real Estate')) }}

				{{ Form::text('cost',   Input::old('cost') ,array('class' => 'form-control' , 'placeholder' => 'Price')) }} 

				{{ Form::text('reason',   Input::old('reason') ,array('class' => 'form-control' , 'placeholder' => 'Reason of Leaving')) }} 

				{{ Form::textarea('comment',   Input::old('comment') ,array('class' => 'form-control' , 'placeholder' => 'Additional Comments?')) }} 


			</div>
		
		<div class="clearfix"></div> 
		<div class="submit-button"> 
			{{ Form::submit('Update', array('class' => 'btn btn-primary btn-lg'))}}
		</div>
		{{ Form::close() }}
	</div>
</div>
@stop