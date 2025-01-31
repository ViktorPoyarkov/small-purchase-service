<?php

namespace App\Repository\Interfaces;

use App\Entity\Tax;

interface ITaxRepository extends IAbstractRepository
{
    public function findOneByTaxNumber(string $taxNumber): ?Tax;
}