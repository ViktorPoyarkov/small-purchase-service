<?php

namespace App\Services\PurchaseService\PurchaseCoordinator\Interfaces;
use App\DTO\PurchaseDTO\Interfaces\IPurchaseDTO as PurchaseDTO;

interface IPurchaseCoordinator
{
    public function processPurchase(PurchaseDTO $purchaseDTO): bool;
}