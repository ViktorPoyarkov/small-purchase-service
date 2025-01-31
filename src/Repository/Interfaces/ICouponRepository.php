<?php

namespace App\Repository\Interfaces;

interface ICouponRepository extends IAbstractRepository
{
    public function findOneByCode(string $code): object|null;
}