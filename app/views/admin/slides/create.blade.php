@extends('admin.master')

@section('stylesheet')
 {{ HTML::style('css/basic.css') }}
@stop

@section('content')

<div class="container">
	
	<div class="formCanvas">
        
		
			{{ Form::open(array('route'=>'slides.store','class'=>'vertical dropzone','id'=>'my-awesome-dropzone','files'=>true)) }}
				
				
			{{ Form::close() }}
		
	</div>

</div>

@stop

@section('scripts')
 
 {{ HTML::script('js/vendor/jquery.js') }}
 {{ HTML::script('js/vendor/dropzone.js') }}
 {{ HTML::script('js/app.js') }}
@stop


@section('scripts')
    @include('partials.success.successMessages')
	@include('partials.errors.errorsMessages')
@stop