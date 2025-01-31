<?php

namespace App\Services\PaymentProcessService\Strategies\Interfaces;

interface IPaymentProcessStrategy extends ICheckSupportPaymentProcessStrategy
{
    public function process(float $price): bool;
}