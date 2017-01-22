@extends('views.layouts.master')

@section('main')

	<div class="bladerunnerjumbo jumbotron">
		<h1>Beautiful<br/>
			WordPress<br/>
			templates!</h1>
		<br/>
		<p>Don't repeat yourself! Write clean and<br/>
			smooth WordPress templates with<br/>a simple Laravel Blade compiler</p>
	</div>

	<h1>Bladerunner</h1>

	@while( have_posts() )

		{{ the_post() }}

		<div class="card">
			<div class="card-block">
				<h3 class="card-title">{{ the_title() }}</h3>
				<h6 class="card-subtitle mb-2 text-muted">{{ get_the_date() }}</h6>
				<p class="card-text">{{ the_content('') }}</p>
				@if(strpos( get_the_content(), 'more-link' ))
				<a href="{{ get_the_permalink() }}" class="card-link">Read more!</a>
				@endif
			</div>
		</div>

		<p>&nbsp;</p>

	@endwhile
	

@endsection