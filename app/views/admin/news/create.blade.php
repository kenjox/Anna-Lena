@extends('admin.master')

@section('content')

<div class="container">
	
	<div class="formCanvas">

		{{ Form::open(array('route'=>'news.store','class'=>'vertical','id'=>'news-form','files'=>true,'data-parsley-validate'=>true)) }}
			<h2>Add news</h2>
			
			<label for="title">Title</label>
			<input type="text" name="title" id="title" value="{{ Input::old('title') }}" required>

			<label for="body">Body</label>
			<textarea class="memberField" name="body" rows="10" required>{{ Input::old('body') }}</textarea>
			

			<label for="image">Image</label> 
			<input type="file" name="image" id="image" value="{{ Input::old('image') }}" required>

			<input type="submit" value="Save"  class="submitButton">

			<div id="spin-area"></div>
	

		{{ Form::close() }}

	</div>

</div>

@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop

