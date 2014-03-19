@extends('admin.master')

@section('content')

<div class="container">

	<div class="formCanvas">

		{{ Form::open(array('route'=>'videos.store','class'=>'vertical','files'=>true)) }}
			
			<h2>Add new video</h2>
			
			<label for="title">Title</label>
			<input type="title" name="title" id="title" value="{{ Input::old('title') }}">

			<label for="videoUrl">Paste Video URL</label>
			<input type="text" name="videoUrl" id="videoUrl" value="{{ Input::old('videoUrl') }}">

			<input type="submit" value="Ladda upp" class="submitButton">

		{{ Form::close() }}

</div>

</div>
@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop