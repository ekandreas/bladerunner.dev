<?php


function model_post_latest($post_type = 'post', $max = 5)
{
    return get_posts([
        'post_type' => $post_type,
        'posts_per_page' => $max,
    ]);
}


add_shortcode('loop_small_posts', 'controller_loop_small_posts');

function controller_loop_small_posts($atts, $content)
{

    $max = isset($atts['max']) ? (int)$atts['max'] : 5;
    $post_type = isset($atts['post_type']) ? esc_attr($atts['post_type']) : 'post';

    $posts = model_post_latest($post_type, $max);

    ob_start();

    set_query_var('loop_small_posts', $posts);
    get_template_part('templates/loop-small-posts');

    $result = ob_get_contents();
    ob_end_clean();

    return $result;
}


function controller_post_72()
{
    $posts = model_post_latest('page', 2);
    set_query_var('latest_pages', $posts);
    get_template_part('templates/special-single-post');
    return null;
}


add_filter('template_include', function ($template) {

    if (is_singular('post') && get_the_ID() == 72) {
        return controller_post_72();
    }
    return $template;
}, 99);


