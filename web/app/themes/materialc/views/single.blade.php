@extends('views.layouts.master')

@section('content')
    {{ the_post($post) }}
    @include('views.modules.post-full')
@endsection
