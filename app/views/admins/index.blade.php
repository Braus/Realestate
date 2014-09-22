@extends('layout.dashboard')


@section('content')
<div class="pull-left">	
<h3><i class="glyphicon glyphicon-dashboard"></i> My Real Estates</h3>  
</div>
<div class="pull-right">
	{{HTML::link(URL::action('AdminsController@create', Auth::user()->username), 'Add a Real Estate', array('class' => 'btn btn-default btn-lg'))}}
</div> 
@if ($user->count())
	
	
	<table class="table table-bordered table striped">
		<thead>
			<tr>
				
				<th>Address</th>
				<th>Date Created</th>
				<th>Preview</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $u)
				<tr>
					
					<td>{{ $u->streetNumber.' '.$u->streetName.' '.$u->streetSufix .', '. $u->suburb.' - '. $u->state}}</td>
					<td><span class="label label-info"> {{ Carbon::createFromTimestamp(strtotime($u->created_at))->diffForHumans() }}</span></td>
					<td>{{ HTML::link(URL::action('AdminsController@show', array(Auth::user()->username, $u->id)),  'Preview', array('class' => 'btn btn-info')) }}
					</td>

					<td>{{ HTML::link(URL::action('AdminsController@edit', array(Auth::user()->username, $u->id)),  'Edit', array('class' => 'btn btn-warning')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('mine.{username}.realestates.destroy', Auth::user()->username, $u->id)))  }}
							{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
						{{ Form::close() }}

					</td>
				</tr>

			@endforeach
		</tbody>
	</table>
	
@else
<div class="has-error col-md-4">You currently have no Real Estate listed</div>

@endif
@stop