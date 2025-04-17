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

    public function setId(ContractId $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setCompanyName(CompanyTitle $companyName): self
    {
        $this->companyName = $companyName;
        return $this;
    }

    public function setTaxIdentificationNumber(AbstractTaxIdentificationNumber $taxIdentificationNumber): self
    {
        $this->taxIdentificationNumber = $taxIdentificationNumber;
        return $this;
    }

    public function setAmount(Amount $amount): self
    {
        $this->amount = $amount;
        return $this;
    }
}
