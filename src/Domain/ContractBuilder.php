<?php

namespace App\Domain;

class ContractBuilder
{
    private ContractId $id;
    private CompanyTitle $companyName;
    private AbstractTaxIdentificationNumber $taxIdentificationNumber;
    private Amount $amount;

    public function build(): Contract
    {
        return new Contract($this);
    }

    public function getId(): ContractId
    {
        return $this->id;
    }

    public function getCompanyName(): CompanyTitle
    {
        return $this->companyName;
    }

    public function getTaxIdentificationNumber(): AbstractTaxIdentificationNumber
    {
        return $this->taxIdentificationNumber;
    }

    public function getAmount(): Amount
    {
        return $this->amount;
    }

    public function setId(ContractId $id): void
    {
        $this->id = $id;
    }

    public function setCompanyName(CompanyTitle $companyName): void
    {
        $this->companyName = $companyName;
    }

    public function setTaxIdentificationNumber(AbstractTaxIdentificationNumber $taxIdentificationNumber): void
    {
        $this->taxIdentificationNumber = $taxIdentificationNumber;
    }

    public function setAmount(Amount $amount): void
    {
        $this->amount = $amount;
    }
}
