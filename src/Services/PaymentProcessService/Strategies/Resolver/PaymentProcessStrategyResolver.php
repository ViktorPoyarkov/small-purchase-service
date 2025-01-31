<?php

namespace App\Services\PaymentProcessService\Strategies\Resolver;

use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO;
use App\Services\PaymentProcessService\Strategies\Interfaces\IPaymentProcessStrategy;

class PaymentProcessStrategyResolver implements Interfaces\IPaymentProcessStrategyResolver
{
    /** @var IPaymentProcessStrategy[] */
    protected array $strategies = [];

    public function __construct(iterable $strategies)
    {
        foreach ($strategies as $strategy) {
            $this->setStrategy($strategy);
        }
    }

    private function setStrategy(IPaymentProcessStrategy $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    public function resolve(IPurchaseDTO $purchaseDTO): ?IPaymentProcessStrategy
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->supports($purchaseDTO->paymentProcessor)) {
                return $strategy;
            }
        }

        return null;
    }
}