<?php

namespace App\Adapter\Controller;

use Factories\ActionFactory;
use Symfony\Component\HttpFoundation\Request;

final class ActionRequestFactory extends Request
{
    public static function getRequest(): ActionRequest
    {
        return new ActionRequest(Request::createFromGlobals());
    }
}
