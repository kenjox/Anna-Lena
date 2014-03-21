@extends('admin.master')

@section('content')
	
	<section class="grid">
		@if(count($tracks) > 0)

		<table class="sortable" cellspacing="0" cellpadding="0">
			<thead><tr class="alt first last">
				<th width="30%">Title</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr></thead>
			<tbody  class="fileList">
				@foreach( $tracks as $track )

					<tr>
						<td>{{ $track->title }}</td>
						<td><a href="{{ route('tracks.edit',array('trackId'=>$track->id)) }}">Edit</a></td>
						<td>
							{{ Form::open(array('route'=>array('tracks.destroy',$track->id),'method'=>'DELETE')) }}
								{{ Form::submit('Delete')}}
							{{ Form::close() }}

						</td>
					</tr>

				@endforeach
				
			</tbody>
		</table>

		@else
			<h1>You have no tracks yet!</h1>
		@endif

	</section>
@stop