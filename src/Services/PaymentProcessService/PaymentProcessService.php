<?php

namespace App\Services\PaymentProcessService;

use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;
use App\Services\PaymentProcessService\Strategies\Resolver\Interfaces\IPaymentProcessStrategyResolver;

class PaymentProcessService implements Interfaces\IPaymentProcessService
{
    public function __construct(
        private IPaymentProcessStrategyResolver $strategyResolver
    )
    {
    }

    public function process(float $price, PurchaseDTO $purchaseDTO): bool
    {
        $strategy = $this->strategyResolver->resolve($purchaseDTO);

        return $strategy->process($price);
    }
}