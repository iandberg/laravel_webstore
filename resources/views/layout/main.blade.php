<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="/css/webstore.css" type="text/css">		
	</head>
	<body>
	
		@include('common.header')
		
		<div id="main_content" class="container">
			
			@yield('content')
			
		</div>
	
	</body>
</html>