<?php

namespace App\Services\PaymentProcessService\Strategies\PaymentProcessors\Interfaces;

interface IStripePaymentProcessor
{
    public function processPayment(float $price): bool;
}