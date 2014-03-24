@extends('admin.master')

@section('content')
	
	<div class="gallery cf">
	@if(count($photos) > 0 )
		@foreach( $photos as $photo )

			<div class="gallery-item">
				{{ HTML::image($photo->imageUrl,null,array('style'=>'width:300px;')) }}
				<span>{{$photo->caption}}</span>
				<p>
				  <a href="#">Remove</a>
				</p>
			</div>
		@endforeach
	@endif
	</div>
@stop