<?php

namespace App\Services\PaymentProcessService\Strategies;

use App\Services\PaymentProcessService\Strategies\PaymentProcessors\Interfaces\IPaypalPaymentProcessor;
use App\Services\PaymentProcessService\Strategies\SupportCheckers\Interfaces\IPaypalSupportPaymentProcessorChecker;

class PaypalPaymentProcessStrategy extends AbstractPaymentProcessStrategy
{
    public function __construct(
        IPaypalSupportPaymentProcessorChecker $supportPaymentProcessorChecker,
        private IPaypalPaymentProcessor $paymentProcessor
    )
    {
        $this->supportPaymentProcessorChecker = $supportPaymentProcessorChecker;
    }

    public function process(float $price): bool
    {
        return $this->paymentProcessor->pay($price * 100);
    }
}