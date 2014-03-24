<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Anna Lena</title>

	{{ HTML::style('css/linus.css') }}

</head>
<body style="background-color: #eeeeee;">
	
	@yield('content')


{{ HTML::script('js/vendor/jquery.min.js') }}
{{ HTML::script('js/vendor/parsley.min.js') }}
{{ HTML::script('js/vendor/humane.min.js') }}
{{ HTML::script('js/vendor/spin.min.js') }}
{{ HTML::script('js/vendor/jquery.spin.js') }}
	
</body>
</html>