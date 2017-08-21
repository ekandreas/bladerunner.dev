<?php
namespace Bladerunner\Theme\MaterialController\Controller;

use Bladerunner\Controller;

class Single extends Controller {

    public function post() {
        return get_post(get_the_ID());
    }

}