@extends('admin.master')

@section('content')
	
	<section class="grid">
		@if(count($news) > 0)

		<table class="sortable" cellspacing="0" cellpadding="0">
			<thead><tr class="alt first last">
				<th width="30%">Title</th>
				<th>Body</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr></thead>
			<tbody  class="fileList">
				@foreach( $news as $article )

					<tr>
						<td>{{ $article->title }}</td>
						<td>{{implode(' ', array_slice(explode(' ', $article->body), 0, 10))}} ...</td>
						<td><a href="{{ route('news.edit',array('newsId'=>$article->id)) }}">Edit</a></td>
						<td>
							{{ Form::open(array('route'=>array('news.destroy',$article->id),'method'=>'DELETE')) }}
								{{ Form::submit('Delete',array('id'=>'deleteBtn')) }}
							{{ Form::close() }}

						</td>
					</tr>

				@endforeach
				
			</tbody>
		</table>

		@else
			<h1>You have no news written yet!</h1>
		@endif

	</section>
@stop
