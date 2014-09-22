@extends('layout.dashboard')


@section('content')
	
<h3><i class="glyphicon glyphicon-dashboard"></i> My Real Estates</h3>  

@if ($user->count())
	
	
	<table class="table table-bordered table striped">
		<thead>
			<tr>
				
				<th>Description</th>
				<th>Date Created</th>
				<th>Preview</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($user as $p)
				<tr>
					
					<td>{{ $p->streetNumber.' '.$p->streetName.' '.$p->streetSufix .', '. $p->suburb.' - '. $p->state}}</td>
					<td><span class="label label-info"> {{ Carbon::createFromTimestamp(strtotime($p->created_at))->diffForHumans() }}</span></td>
					<td>{{ link_to_route('realestates.show', 'Preview', array($p->id), array('class' => 'btn btn-info')) }}</td>
					<td>{{ link_to_route('realestates.edit', 'Edit', array($p->id), array('class' => 'btn btn-warning')) }}</td>
					<td>
						{{ Form::open(array('method' => 'DELETE', 'route' => array('realestates.destroy', $p->id)))  }}
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