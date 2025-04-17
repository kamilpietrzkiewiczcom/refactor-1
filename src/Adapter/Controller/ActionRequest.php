<?php

namespace App\Adapter\Controller;

use App\Domain\AbstractAction;
use App\Factories\ActionFactory;
use Symfony\Component\HttpFoundation\Request;

final class ActionRequest
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

    public function isValid(): bool
    {
        return $this->getId() !== null;
    }

    public function getId(): ?int
    {
        return $this->httpRequest->query->get('id');
    }

    public function getAction(): AbstractAction
    {
        return ActionFactory::get($this->httpRequest->query->get('akcja'));
    }

    public function getSort(): ?int
    {
        return $this->httpRequest->query->get('sort');
    }
}
