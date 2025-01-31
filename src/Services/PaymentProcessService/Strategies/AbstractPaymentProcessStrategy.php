<?php

namespace App\Services\PaymentProcessService\Strategies;

use App\Services\PaymentProcessService\Strategies\Interfaces\IPaymentProcessStrategy;
use App\Services\PaymentProcessService\Strategies\SupportCheckers\Interfaces\ISupportPaymentProcessorChecker
    as SupportPaymentProcessorChecker;

abstract class AbstractPaymentProcessStrategy implements IPaymentProcessStrategy
{
    protected SupportPaymentProcessorChecker $supportPaymentProcessorChecker;

    public function supports(string $paymentProcessor): bool
    {
        return $this->supportPaymentProcessorChecker->supports($paymentProcessor);
    }
}