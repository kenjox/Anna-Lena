@extends('admin.master')

@section('content')

<div class="container">
	
	<div class="formCanvas">

		
		{{ Form::model($news, array('route'=>array('news.update',$news->id),'method'=>'PUT')) }}	
			<h2>Edit news</h2>
			
			
			@if($news->imageUrl )
			   {{HTML::image($news->imageUrl,$news->title,array('style'=>'width:645px; height:496px;') ) }}
			@endif

			<label for="photo">Choose photo</label>
			<input type="file" name="photo" value="{{ Input::old('photo') }}">
			
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ $news->title }}">

			<label for="body">Body</label>
			<textarea class="memberField" name="body" rows="10">{{ $news->body }}</textarea>
			
			<input type="submit" value="Update"  class="submitButton">
	
		{{ Form::close() }}


	</div>

</div>

@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop