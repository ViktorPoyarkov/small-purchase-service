<?php

namespace App\Repository;

use App\Repository\Interfaces\IAbstractRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

abstract class AbstractRepository extends ServiceEntityRepository implements IAbstractRepository
{
    public function findOneById(int $id): object|null
    {
        return $this->findOneBy(['id' => $id]);
    }
}