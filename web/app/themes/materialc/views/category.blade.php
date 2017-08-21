@extends('views.layouts.master')

@section('content')
        <div class="card">
            <div class="card-header" data-background-color="orange">
                <h1 class="title">Category: {{ get_queried_object()->name }}</h1>
                <p class="category">Posts with the selected category</p>
            </div>
            <div class="card-content table-responsive">
                <table class="table">
                    <tbody>
                    @foreach($result as $post)
                        @include('views.modules.post-row', ['post'=>$post, 'post_type'=>true])
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection