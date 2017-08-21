<tr>
    <td>
        <a href="{{ get_permalink($post->ID) }}">{{ $post->post_title }}</a>
    </td>
    <td>
        {{ get_the_date('Y-m-d', $post->ID) }}
    </td>
    @if($post_type)
        <td>
            {{ $post->post_type=='page' ? 'landing page' : '' }}
            {{ $post->post_type=='post' ? 'blog post' : '' }}
        </td>
    @endif
    <td>
        {{ substr(strip_tags(apply_filters('the_content', $post->post_content)), 0, 60) }}...
    </td>
</tr>
