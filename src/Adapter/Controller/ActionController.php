<?php

namespace App\Adapter\Controller;

use App\Adapter\View\View;

class ActionController
{
    public function __construct()
    {

    }

    public function __invoke(ActionRequest $request)
    {

        $view = new View('Template', []);
        $view->render();
    }
}