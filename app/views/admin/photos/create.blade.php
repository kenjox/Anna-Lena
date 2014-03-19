@extends('admin.master')

@section('content')

<div class="container">

	<div class="formCanvas">

		{{ Form::open(array('route'=>'photos.store','class'=>'vertical','files'=>true)) }}
			
			<h2>Add new photo</h2>
			
			<label for="photo">Choose photo</label>
			<input type="file" name="photo" value="{{ Input::old('photo') }}">
			
			<label for="caption">Image caption</label>
			<textarea class="memberField" name="caption">{{ Input::old('caption') }}</textarea>
	
			<input type="submit" value="Ladda upp" class="submitButton">

		{{ Form::close() }}

</div>

</div>
@stop

@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop