<?php

add_theme_support( 'title-tag' );


function assets($fileName)
{
    return get_stylesheet_directory_uri() . "/assets/{$fileName}";
}


