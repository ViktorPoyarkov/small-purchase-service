<?php

namespace App\Services\PaymentProcessService\Strategies\PaymentProcessors;

use App\Services\PaymentProcessService\Strategies\PaymentProcessors\Interfaces\IStripePaymentProcessor;
use JetBrains\PhpStorm\Pure;
use Systemeio\TestForCandidates\PaymentProcessor\StripePaymentProcessor as ExternalPaymentProcessor;

class StripePaymentProcessor implements IStripePaymentProcessor
{
    public function __construct(private ExternalPaymentProcessor $paymentProcessor)
    {
    }

    #[Pure]
    public function processPayment(float $price): bool
    {
        return $this->paymentProcessor->processPayment($price);
    }

}