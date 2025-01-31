<?php

namespace App\Services\TaxService\TaxNumberValidateService\Interfaces;

interface ITaxNumberValidateService
{
    public function validateTaxNumber(string $taxNumber): bool;
}