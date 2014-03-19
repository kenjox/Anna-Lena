@extends('admin.master')

@section('content')

<div class="container">
	
	<div class="formCanvas">
        
		{{ Form::open(array('route'=>'tours.store','class'=>'vertical','files'=>true)) }}
			
			<h2>Add new tour</h2>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ Input::old('title') }}">

			<label for="body">Body</label>
			<textarea class="memberField" name="body" rows="10">{{ Input::old('body') }}</textarea>
			

			<label for="image">Image</label>
			<input type="file" name="image" id="image" value="{{ Input::old('image') }}">

			<input type="submit" value="Save"  class="submitButton">

		{{ Form::close() }}

	</div>

</div>

@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop