<?php

namespace App\Services\PriceCalculateService\Strategies;
use App\Entity\Coupon;
use App\Services\PriceCalculateService\Strategies\SupportCheckers\Interfaces\IPercentageCouponSupportChecker;
use JetBrains\PhpStorm\Pure;

class PercentageCouponPriceCalculateStrategy extends AbstractPriceCalculateStrategy
{
    public function __construct(private IPercentageCouponSupportChecker $couponSupportChecker)
    {
        parent::__construct($this->couponSupportChecker);
    }

    #[Pure]
    public function calculate(float $price, float $tax, Coupon $coupon): float
    {
        return $price + ($price * $tax) - ($price * $coupon->getValue());
    }
}