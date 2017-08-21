@extends('views.layouts.master')

@section('title')
    SEARCH for "{{ $_REQUEST['s'] }}"
@endsection

@section('content')
    @if($result->posts)
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h1 class="title">Search result</h1>
                <p class="category">Search for "{{ $_REQUEST['s'] }}"</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <tbody>
                        @foreach($result->posts as $post)
                            @include('views.modules.post-row', ['post'=>$post, 'post_type'=>true])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection