<?php

function assets($fileName)
{
    return get_stylesheet_directory_uri() . "/assets/{$fileName}";
}


