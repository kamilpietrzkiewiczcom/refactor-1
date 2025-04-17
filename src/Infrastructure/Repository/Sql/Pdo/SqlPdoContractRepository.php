<?php

namespace App\Infrastructure\Repository\Sql\Pdo;

use App\Domain\Amount;
use App\Domain\CompanyTitle;
use App\Domain\Contract;
use App\Domain\ContractId;
use App\Domain\ContractsCollection;
use App\Domain\ContractsRepository;
use App\Domain\Nip;
use App\Domain\SortCollection;
use PDO;

class SqlPdoContractRepository implements ContractsRepository
{
    public function __construct(private PDO $pdo) {}

    public function getContracts(
        ContractId $contractId,
        SortCollection $sort = new SortCollection()
    ): ContractsCollection {
        return $this->getSpecificContracts($contractId, $sort);
    }

    private function getSpecificContracts(
        ContractId $contractId,
        SortCollection $sort = new SortCollection()
    ): ContractsCollection {
        $collection = new ContractsCollection();

        $where = "id = :id AND amount > 10 ";

        $orderBy = "";

        if (!$sort->isEmpty()) {
            $orderBy .= " ORDER BY " . $sort->getAsComaSeparatedString();
        }

        $orderByFlow = "";

        if ($sort->contains(["companyTitle", "tin"])) {
            $orderByFlow .= " DESC";
        }

        $sql = "SELECT * FROM contracts WHERE " . $where . $orderBy . $orderByFlow;

        $sth = $this->pdo->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute([':id' => $contractId->getId()]);
        $results = $sth->fetchAll();

        foreach ($results as $entry) {
            $collection->append(
                Contract::getBuilder()
                ->setId(new ContractId($entry['id']))
                ->setCompanyName(new CompanyTitle($entry['companyTitle']))
                ->setTaxIdentificationNumber(new Nip($entry['tin']))
                ->setAmount(new Amount($entry['amount']))
                ->build()
            );
        }

        return $collection;
    }
}
