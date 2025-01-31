<?php

namespace App\Services\CouponService\Interfaces;

use App\Entity\Coupon;

interface ICouponService
{
    public function getCoupon(string $code): ?Coupon;
}