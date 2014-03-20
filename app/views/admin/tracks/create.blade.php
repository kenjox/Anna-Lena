@extends('admin.master')

@section('content')

<div class="container">

	<div class="formCanvas">

		{{ Form::open(array('route'=>'tracks.store','class'=>'vertical','files'=>true)) }}
			
			<h2>Add new track</h2>
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ Input::old('title') }}">
			
			<p>
				
				<label for="track">Choose track</label>
				<input type="file" name="track">
				
			</p>
	
			<input type="submit" value="Ladda upp" class="submitButton">

		{{ Form::close() }}

</div>

</div>
@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop