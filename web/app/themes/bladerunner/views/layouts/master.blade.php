<!doctype html>
<html lang="">

	@include('views.parts.head')

	<body {{ body_class() }}>

		@include('views.parts.header')

		<div class="container">

				<div class="row">
					<div class="col-md-12 col-xs-12">
						@yield('main')
					</div>
				</div>

		</div>

		@include('views.parts.footer')

		@include('views.parts.ga')

		@include('views.parts.scripts')

	</body>

</html>