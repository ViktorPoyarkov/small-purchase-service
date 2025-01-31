<?php

namespace App\Services\PriceCalculateService\Strategies\Resolver\Interfaces;

use App\Entity\Coupon;
use App\Services\PriceCalculateService\Strategies\Interfaces\IPriceCalculateStrategy;

interface IPriceCalculateStrategyResolver
{
    public function setCoupon(Coupon $coupon): void;
    public function resolve(): ?IPriceCalculateStrategy;
}