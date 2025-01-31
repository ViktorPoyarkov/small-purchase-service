<?php

namespace App\Services\PaymentProcessService\Strategies\SupportCheckers\Interfaces;

interface ISupportPaymentProcessorChecker
{
    public function supports(string $paymentProcess): bool;
}