

{{-- Laravel Validation errors from error box --}}			

@if($errors->any())
	<ul>
		<script type="text/javascript">
	      humane.log("<p>The following errors occured:</p>{{ implode('', $errors->all('<li>:message</li>') ) }}",{addnCls:'humane-flatty-error',timeout:3000});
		</script>
	</ul>
@endif


{{-- Login errors --}}

@if( Session::has('loginErrors') )
<div class="notice error danger">
	<p>{{ Session::get('loginErrors') }}</p>
	<a href="#close" class="icon-remove"></a>
</div>
@endif

