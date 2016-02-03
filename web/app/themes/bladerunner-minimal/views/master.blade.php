<!doctype html>
<html>
	<head>
      <meta charset="utf-8">
  		<title>{{ wp_title() }}</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css" rel="stylesheet" />
      {{ wp_head() }}
  </head>
  <body {{ body_class() }}>
  		<div class="main container">
  			@yield('main')
  		</div>
      {{ wp_footer() }}
	</body>
</html>