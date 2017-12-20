<?php

use Bladerunner\Controller;

class IndexController extends Controller
{
    protected $template = 'views.index';

    public function posts()
    {
        $postModel = new Post();
        return 'hello world';
    }
}
