<?php

namespace App\Services\CouponService;

use App\Entity\Coupon;
use App\Repository\Interfaces\ICouponRepository;
use App\Services\CouponService\Interfaces\ICouponService;

class CouponService implements ICouponService
{
    public function __construct(private ICouponRepository $repository)
    {
    }

    public function getCoupon(string $code): ?Coupon
    {
        return $this->repository->findOneByCode($code);
    }
}