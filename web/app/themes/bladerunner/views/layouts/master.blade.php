<!doctype html>
<html lang="">
	@include('views.parts.head')
	<body {{ body_class() }}>

		<div class="container">
				@include('views.parts.header')
				@yield('main')
				@include('views.parts.footer')
		</div>

		@include('views.parts.ga')

		@include('views.parts.scripts')

	</body>
</html>