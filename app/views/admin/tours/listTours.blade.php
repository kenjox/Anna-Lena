@extends('admin.master')

@section('content')
	
	<section class="grid">
		@if(count($tours) > 0)

		<table class="sortable" cellspacing="0" cellpadding="0">
			<thead><tr class="alt first last">
				<th width="30%">Title</th>
				<th>Body</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr></thead>
			<tbody  class="fileList">
				@foreach( $tours as $tour )

					<tr>
						<td>{{ $tour->title }}</td>
						<td>{{implode(' ', array_slice(explode(' ', $tour->body), 0, 10))}} ...</td>
						<td><a href="{{ route('tours.edit',array('toursId'=>$tour->id)) }}">Edit</a></td>
						<td>
							{{ Form::open(array('route'=>array('tours.destroy',$tour->id),'method'=>'DELETE')) }}
								{{ Form::submit('Delete',array('id'=>'deleteBtn')) }}
							{{ Form::close() }}

						</td>
					</tr>

				@endforeach
				
			</tbody>
		</table>

		@else
			<h1>You have no tours written yet!</h1>
		@endif

	</section>
@stop
