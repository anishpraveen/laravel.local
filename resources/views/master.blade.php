<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<?php date_default_timezone_set("Asia/Kolkata"); ?>
</head>
<body>
	<div class="container">
		<div class="row">
			<ul>
				<li><a href="/home">Home</a></li>
				<li><a href="/contact">Contact</a> </li>
				<li><a href="/about">About</a> </li>
				<li><a href="/posts">Posts</a> </li>
			</ul>
		</div>
		
	</div>
<div class="container">

	@yield('content')
	
</div>

<div class="container">

	@yield('footer')
	
</div>
</body>
</html>