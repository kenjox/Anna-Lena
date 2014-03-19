{{-- Success messages --}}

@if( Session::has('success') )
	<script>
		humane.log("<span>{{ Session::get('success') }}</span>",{addnCls:'notice success',timeout:3000});
	</script>
@endif

