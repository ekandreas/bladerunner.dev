@extends('views.layouts.master')

@section('main')

	<h1>{{ the_title() }}</h1>

	@while( have_posts() )

		{{ the_post() }}

		<p>{{ the_content() }}</p>

	@endwhile
	

@endsection