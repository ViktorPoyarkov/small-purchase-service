<?php

namespace App\Services\PriceCalculateService\Strategies\Resolver;

use App\Entity\Coupon;
use App\Services\PriceCalculateService\Strategies\Interfaces\IPriceCalculateStrategy;

class PriceCalculateStrategyResolver implements Interfaces\IPriceCalculateStrategyResolver
{
    /** @var IPriceCalculateStrategy[] */
    protected array $strategies = [];

    private Coupon $coupon;

    /** @param IPriceCalculateStrategy[] */
    public function __construct(iterable $strategies)
    {
        foreach ($strategies as $strategy) {
            $this->setStrategy($strategy);
        }
    }

    public function setCoupon(Coupon $coupon): void
    {
        $this->coupon = $coupon;
    }

    private function setStrategy(IPriceCalculateStrategy $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    public function resolve(): ?IPriceCalculateStrategy
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($this->coupon)) {
                return $strategy;
            }
        }

        return null;
    }
}