<?php

namespace App\Services\PaymentProcessService\Strategies\Interfaces;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;

interface ICheckSupportPaymentProcessStrategy
{
    public function supports(string $paymentProcessor): bool;
}