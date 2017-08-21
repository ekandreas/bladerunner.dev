<div class="card">
    <div class="card-header" data-background-color="orange">
        <h2 class="title">{{ the_title() }}</h2>
        <p class="category">{{ the_date('Y-m-d') }}</p>
    </div>
    <div class="card-content table-responsive">

        @if($terms=wp_get_post_terms(get_the_ID(), 'category', ["fields" => "all"]))
            <p>
                @foreach($terms as $term)
                    <a href="{{ get_term_link($term->term_id) }}"><i class="fa fa-tag" aria-hidden="true"></i> {{ $term->name }}</a>&nbsp;&nbsp;&nbsp;
                @endforeach
            </p>
        @endif

        <br/>
        {!! apply_filters('the_content', the_content()) !!}
    </div>
</div>
