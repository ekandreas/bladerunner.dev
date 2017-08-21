<div class="card">
    <div class="card-header" data-background-color="orange">
        <h2 class="title">{{ the_title() }}</h2>
        <p class="category">{{ the_date('Y-m-d') }}</p>
    </div>
    <div class="card-content table-responsive">
        <br/>
        {!! apply_filters('the_content', the_content()) !!}
    </div>
</div>
