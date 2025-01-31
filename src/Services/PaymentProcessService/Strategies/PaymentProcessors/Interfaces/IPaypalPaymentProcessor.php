<?php

namespace App\Services\PaymentProcessService\Strategies\PaymentProcessors\Interfaces;
interface IPaypalPaymentProcessor
{
    public function pay(int $price): bool;
}