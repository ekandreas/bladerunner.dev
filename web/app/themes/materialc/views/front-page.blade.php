@extends('views.layouts.master')

@section('content')
    <div class="card">
        <div class="card-header" data-background-color="orange">
            <h1 class="title">Bladerunner</h1>
            <p class="category">{{ get_bloginfo('description') }}!</p>
        </div>
        <div class="card-content table-responsive">
            <br/>
            {{ the_post() }}
            {!! apply_filters('the_content', get_the_content()) !!}
        </div>
    </div>
    @if($posts)
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h1 class="title">Latest blog posts</h1>
                <p class="category">News around Bladerunner development and the future</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <tbody>
                    @foreach($posts as $post)
                        @include('views.modules.post-row', ['post'=>$post, 'post_type'=>false])
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
