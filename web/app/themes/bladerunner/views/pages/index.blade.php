@extends('views.layouts.master')

@section('main')

	@while( have_posts() )

		{{ the_post() }}

		<h2>{{ the_title() }}</h2>
		<p>{{ the_content('(Read post)') }}</p>

		<hr/>
		
	@endwhile
	

@endsection