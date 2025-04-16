<?php

namespace App\Di;

use App\Adapter\Controller\ActionController;
use App\Adapter\Controller\ActionRequestFactory;
use App\Domain\ContractsRepository;
use App\Infrastructure\Repository\Sql\Pdo\SqlPdoContractRepository;
use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class Definitions
{
    public static function getDefinitions(Request $request): array
    {
        return [
            ContractsRepository::class => \DI\factory(function (ContainerInterface $c) use ($request) {


                return new SqlPdoContractRepository();
            }),

            ActionController::class => \DI\factory(function (ContainerInterface $c) use ($request) {
                return new ActionController(/*$c->get('db.host')*/);
            }),
        ];
    }
}