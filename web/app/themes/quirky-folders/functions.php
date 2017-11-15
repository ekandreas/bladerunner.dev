<?php

/*
add_filter('bladerunner/template/bladepath', function ($paths) {
    if (!is_array($paths)) {
        $paths = [$paths];
    }
    $paths[] = get_template_directory() . "/app/views";
    return $paths;
});
*/


add_filter('bladerunner/controller/paths', function ($paths) {
    $paths[] = get_template_directory() . '/app/controllers';
    return $paths;
});
