<?php

namespace App\Repository;

use App\Entity\Coupon;
use App\Repository\Interfaces\ICouponRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Coupon>
 */
class CouponRepository extends AbstractRepository implements ICouponRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coupon::class);
    }

    public function findOneByCode(string $code): object|null
    {
        return $this->findOneBy(['code' => $code]);
    }
}
