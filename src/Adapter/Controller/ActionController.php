<?php

namespace App\Adapter\Controller;

use App\Adapter\View\View;
use App\Application\ActionService;
use App\Domain\ContractId;
use App\Helper\Db;
use RuntimeException;

class ActionController
{
    public function __construct(private ActionService $actionService) {}

    public function __invoke(ActionRequest $request): never
    {
        if (!$request->isValid()) {
            throw new RuntimeException("Request not valid. Provide get params: id.");
        }
        $contracts = $this->actionService->getContracts(new ContractId($request->getId()), $request->getAction());
        $view = new View('Template', [
            'collection' => $contracts->getResponse(),
            'dgBgcolor' => '#F0F0F0',
            'action' => $request->getAction()
        ]);
        $view->render();
        die;
    }
}
