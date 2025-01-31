<?php

namespace App\Services\PurchaseService\Interfaces;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;
interface IPurchaseService
{
    public function purchase(PurchaseDTO $purchaseDTO): bool;
}