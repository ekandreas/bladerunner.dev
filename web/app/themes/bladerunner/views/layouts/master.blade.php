<!doctype html>
<html lang="">

	@include('views.parts.head')

	<body {{ body_class() }}>

		<div class="container">

				@include('views.parts.header')

				<div class="row">
					<div class="col-md-8 col-xs-12">
						@yield('main')
					</div>
					<div class="col-md-4 col-xs-12">
						{{ dynamic_sidebar('sidebar') ? '' : '' }}
					</div>
				</div>

				@include('views.parts.footer')

		</div>

		@include('views.parts.ga')

		@include('views.parts.scripts')

	</body>

</html>