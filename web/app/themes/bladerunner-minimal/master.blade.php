<!doctype html>
<html lang="">

	<head>
  		<meta charset="utf-8">
  		<title>{{ wp_title() }}</title>
  		{{ wp_head() }}
  	</head>
  	
  	<body {{ body_class() }}>
  		
  		<div class="main">
  			@yield('main')
  		</div>

	</body>
</html>