@extends('views.layouts.master')

@section('main')

	<h1>Home</h1>

	@while( have_posts() )

		{{ the_post() }}

		<h2>{{ the_title() }}</h2>
		<p>{{ the_content() }}</p>
		<a href="{{ the_permalink() }}">Read more...</a>

	@endwhile
	

@endsection