<?php
namespace Bladerunner\Theme\MaterialController\Controller;

use Bladerunner\Controller;

class Category extends Controller {

    public function tax() {
        $object = get_queried_object();
        return [
            [
                'taxonomy' => $object->taxonomy,
                'field' => 'term_id',
                'terms' => $object->term_id,
            ]
        ];
    }

    public function args() {
        $tax = $this->tax();
        return [
            'tax_query' => $tax,
            'posts_per_page' => -1,
            'post_type' => 'post',
        ];
    }

    public function result() {
        $args = $this->args();
        return get_posts($args);
    }

    public function object() {
        return get_queried_object();
    }

}