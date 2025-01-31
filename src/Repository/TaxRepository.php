<?php

namespace App\Repository;

use App\Entity\Tax;
use App\Repository\Interfaces\ITaxRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tax>
 */
class TaxRepository extends AbstractRepository implements ITaxRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tax::class);
    }

    public function findOneByTaxNumber(string $taxNumber): ?Tax
    {
        return $this->findOneBy(['country' => substr($taxNumber, 0, 2)]);
    }
}
