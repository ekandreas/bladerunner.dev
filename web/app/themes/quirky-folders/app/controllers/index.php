<?php
// app/controllers/index.php with controllers path set

use Bladerunner\Controller;

class IndexController extends Controller
{
    protected $template = 'app.views.index';

    public function hello()
    {
        return 'hello world';
    }
}
