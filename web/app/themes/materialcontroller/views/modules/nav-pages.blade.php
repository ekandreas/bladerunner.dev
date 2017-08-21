@if($pages=get_pages(['sort_column' => 'menu_order']))
    @foreach($pages as $page)
        <li class="{{ is_page($page->ID) ? 'active' : '' }}">
            <a href="{{ get_permalink($page->ID) }}">
                {!! ($fa = get_post_meta($page->ID, 'fa', true)) ? "<i class=\"fa {$fa}\"></i>":"<i class=\"fa fa-file-text\"></i>" !!}
                <p>{{ $page->post_title }}</p>
            </a>
        </li>
    @endforeach
@endif