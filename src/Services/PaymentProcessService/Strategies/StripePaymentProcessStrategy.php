<?php

namespace App\Services\PaymentProcessService\Strategies;

use App\Services\PaymentProcessService\Strategies\PaymentProcessors\Interfaces\IStripePaymentProcessor;
use App\Services\PaymentProcessService\Strategies\SupportCheckers\Interfaces\IStripeSupportPaymentProcessorChecker;

class StripePaymentProcessStrategy extends AbstractPaymentProcessStrategy
{
    public function __construct(
        IStripeSupportPaymentProcessorChecker $supportPaymentProcessorChecker,
        private IStripePaymentProcessor $paymentProcessor
    )
    {
        $this->supportPaymentProcessorChecker = $supportPaymentProcessorChecker;
    }

    public function process(float $price): bool
    {
        return $this->paymentProcessor->processPayment($price);
    }
}