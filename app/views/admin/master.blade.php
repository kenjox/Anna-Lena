<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Anna Lena</title>

    {{ HTML::style('css/vendor/flatty.css') }}
	{{ HTML::style('css/linus.css') }}
	
	@yield('stylesheet')

</head>
<body>

<div id="leftContent" class="admin">
		<h2>Admin</h2>
		<ul class="mainLeftNav">
			<li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
			<li><a href="{{ route('slides.create') }}">Add new slide photo</a></li>
		</ul>

		<h2>News</h2>
		<ul class="mainLeftNav">
			<li><a href="{{ route('news.create') }}">Add news</a></li>
			<li><a href="{{ route('news') }}">List news</a></li>
		</ul>

		<h2>Tours</h2>
		<ul class="mainLeftNav">
			<li><a href="{{ route('tours.create') }}">Add tour</a></li>
			<li><a href="{{ route('tours') }}">List of tours</a></li>

		</ul>

		<h2>Tracks</h2>
		<ul class="mainLeftNav">
			<li><a href="{{ route('tracks.create') }}">Add track</a></li>
			<li><a href="{{ route('tracks') }}">List tracks</a></li>
		</ul>

		<h2>Photos</h2>
		<ul class="mainLeftNav">
			<li><a href="{{ route('photos.create') }}">Add photo</a></li>
			<li><a href="{{ route('photos') }}">List photos</a></li>
		</ul>

		<h2>Videos</h2>
		<ul class="mainLeftNav">
			<li><a href="{{ route('videos.create') }}">Add video</a></li>
		</ul>
				
		<ul class="mainLeftNav">
			<li><a href="{{ route('users.logout') }}">Logout</a></li>
		</ul>
	
</div>

<div id="rightContent" class="admin">

	<div class="content">
        <div id="adminSubNav">

        </div>

        <div class="grid simple">
        	<div class="gridTitle">
                <h4><span class="semiBold">Adminpanel</span> - Anna Lena </h4>
            </div>

            <div class="gridContent">
            	@yield('content')
            </div>
        </div>
    </div>

</div>

{{ HTML::script('js/vendor/jquery.min.js') }}
{{ HTML::script('js/vendor/parsley.min.js') }}
{{ HTML::script('js/vendor/humane.min.js') }}
{{ HTML::script('js/vendor/spin.min.js') }}
{{ HTML::script('js/vendor/jquery.spin.js') }}
{{ HTML::script('js/app.js') }}

@yield('scripts')

</body>
</html>