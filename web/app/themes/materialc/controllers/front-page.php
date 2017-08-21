<?php
namespace Bladerunner\Theme\MaterialController\Controller;

use Bladerunner\Controller;

class FrontPage extends Controller {

    public function posts() {
        $posts = get_posts([
            'posts_per_page' => 10,
            'post_type' => 'post',
        ]);
        return $posts;
    }

}