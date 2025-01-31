<?php

namespace App\Services\PaymentProcessService\Strategies\Resolver\Interfaces;

use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO;
use App\Services\PaymentProcessService\Strategies\Interfaces\IPaymentProcessStrategy;

interface IPaymentProcessStrategyResolver
{
    public function resolve(IPurchaseDTO $purchaseDTO): ?IPaymentProcessStrategy;
}