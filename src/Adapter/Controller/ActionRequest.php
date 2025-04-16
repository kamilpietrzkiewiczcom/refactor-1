<?php

namespace App\Adapter\Controller;

use Factories\ActionFactory;
use Symfony\Component\HttpFoundation\Request;

final class ActionRequest extends Request
{
    private Request $httpRequest;

    public function __construct(Request $request)
    {
        $this->requestEquals($request);
    }

    private function requestEquals(Request $request): void
    {
        $this->httpRequest = $request;
    }

    public function getAction(): int
    {
        return ActionFactory::get($this->httpRequest->query->get('akcja'));
    }

    public function getSort(): int
    {
        return ActionFactory::get($this->httpRequest->query->get('sort'));
    }
}
