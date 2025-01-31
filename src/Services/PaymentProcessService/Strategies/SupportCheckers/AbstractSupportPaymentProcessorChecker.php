<?php

namespace App\Services\PaymentProcessService\Strategies\SupportCheckers;

abstract class AbstractSupportPaymentProcessorChecker
{
    protected string $paymentProcessor;
    public function supports(string $paymentProcess): bool
    {
        if ($paymentProcess === $this->paymentProcessor) {
            return true;
        }

        return false;
    }
}