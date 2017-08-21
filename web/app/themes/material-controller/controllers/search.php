<?php
namespace Bladerunner\Theme\MaterialController\Controller;

use Bladerunner\Controller;

class Search extends Controller {

    public function result() {
        global $query_string;

        $search_query = [];

        wp_parse_str( $query_string, $search_query );

        $search = new \WP_Query( $search_query );

        return $search;
    }

}