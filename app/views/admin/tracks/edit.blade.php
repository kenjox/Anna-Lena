@extends('admin.master')

@section('content')

<div class="container">

	<div class="formCanvas">

		{{ Form::model($track, array('route'=>array('tracks.update',$track->id),'method'=>'PUT','files'=>true)) }}	
			
			<h2>Edit {{$track->title }}</h2>

			{{ Form::label('title','Title') }}
			{{ Form::text('title') }}

			{{ Form::label('track','Choose track') }}
			{{ Form::file('track') }}
			
			{{ Form::submit('Update',array('class'=>'submitButton')) }}
	

		{{ Form::close() }}

</div>

</div>
@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop