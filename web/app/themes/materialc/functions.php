<?php

add_theme_support( 'title-tag' );


function assets($fileName)
{
    return get_stylesheet_directory_uri() . "/assets/{$fileName}";
}


add_filter('bladerunner/extend', function($content) {

    $content = preg_replace('/animal/i', 'apa', $content);

    return $content;
});
