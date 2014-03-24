@extends('master')

@section('content')

<div class="container" style="background-color: #eeeeee;">
	
	<div class="formCanvas">
       
        <p style="width: 100%; float: left;  margin-top:40px;">@include('partials/logo')</p>
		
		<fieldset>

			@include('partials/errors/errorsMessages')

			@include('partials/success/successMessages')

			{{ Form::open(array('route'=>'users.login','class'=>'vertical','data-parsley-validate'=>true) ) }}
				
					<label for="email" value="Email">Email</label>
					<input type="text" name="email" id="email" value="{{ Input::old('email')}}" required>
				
					<label for="password" value="Password">Password</label>
					<input type="password" name="password" id="password" required>
				
					<input type="submit" value="Logga in" class="submitButton">
			{{ Form::close() }}
		</fieldset>
		

    </div>

</div>



@stop