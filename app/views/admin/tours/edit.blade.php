@extends('admin.master')

@section('content')

<div class="container">
	
	<div class="formCanvas">

		
		{{ Form::model($tours, array('route'=>array('tours.update',$tours->id),'method'=>'PUT','files'=>true)) }}	
			<h2>Edit tours</h2>
			
			@if($tours->imageUrl )
			   {{HTML::image($tours->imageUrl,$tours->title,array('style'=>'width:300px;') ) }}
			@endif

			<label for="photo">Choose photo</label>
			<input type="file" name="image">
			
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ $tours->title }}">

			<label for="body">Body</label>
			<textarea class="memberField" name="body" rows="10">{{ $tours->body }}</textarea>
			
			<input type="submit" value="Update"  class="submitButton">
	
		{{ Form::close() }}


	</div>

</div>

@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop