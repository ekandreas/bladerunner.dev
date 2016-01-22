<?php

add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}

function remove_more_link_scroll($link)
{
    $link = preg_replace('|#more-[0-9]+|', '', $link);
    return $link;
}
add_filter('the_content_more_link', 'remove_more_link_scroll');


add_action('after_setup_theme', 'remove_core_updates');
function remove_core_updates()
{
    if (! current_user_can('update_core')) {
        return;
    }
    add_action('init', create_function('$a', "remove_action( 'init', 'wp_version_check' );"), 2);
    add_filter('pre_option_update_core', '__return_null');
    add_filter('pre_site_transient_update_core', '__return_null');
}

remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_null');

function remove_core_updates2()
{
    global $wp_version;
    return (object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core', 'remove_core_updates2');
add_filter('pre_site_transient_update_plugins', 'remove_core_updates2');
add_filter('pre_site_transient_update_themes', 'remove_core_updates2');

/**
 * Block external WordPress API request
 */
function wp_api_block_request($pre, $args, $url)
{
    if (strpos($url, 'api.wordpress.org')) {
        return true;
    } else {
        return $pre;
    }
}
add_filter('pre_http_request', 'wp_api_block_request', 10, 3);

function shieldHtmlImage($url)
{
    $key = 'shield_' . md5($url);
    $stored_url = get_transient($key);
    if (!$stored_url) {
        $content = file_get_contents($url);
        if( $content ) {
            $uploads = wp_upload_dir();
            $storage_file = $uploads['path'].'/'.$key.'.svg';
            $stored_url = $uploads['url'].'/'.$key.'.svg';
            if (file_put_contents($storage_file, $content)) {
                set_transient($key, $stored_url, 60*15);
            } else {
                $stored_url = null;
            }
        }
    }

    if( $stored_url ) {
        return '<img src="' . $stored_url . '" alt="shield for ' . $url . '" />';
    }

}
