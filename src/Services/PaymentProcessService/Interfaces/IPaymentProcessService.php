<?php

namespace App\Services\PaymentProcessService\Interfaces;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;
interface IPaymentProcessService
{
    public function process(float $price, PurchaseDTO $purchaseDTO): bool;
}