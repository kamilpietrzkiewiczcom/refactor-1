<?php

namespace App\Di;

use App\Adapter\Controller\ActionController;
use App\Adapter\Controller\ActionRequestFactory;
use App\Application\ActionService;
use App\Domain\ContractsRepository;
use App\Helper\Db;
use App\Infrastructure\Repository\Sql\Pdo\SqlPdoContractRepository;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class Definitions
{
    public static function getDefinitions(Request $request): array
    {
        return [
            ContractsRepository::class => \DI\factory(function (ContainerInterface $c) use ($request) {
                return new SqlPdoContractRepository(Db::getInstance());
            }),

            ActionService::class => \DI\factory(function (ContainerInterface $c) use ($request) {
                return new ActionService($c->get(ContractsRepository::class));
            }),

            ActionController::class => \DI\factory(function (ContainerInterface $c) use ($request) {
                return new ActionController($c->get(ActionService::class));
            }),
        ];
    }
}