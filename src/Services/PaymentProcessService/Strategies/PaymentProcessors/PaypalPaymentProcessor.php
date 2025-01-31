<?php

namespace App\Services\PaymentProcessService\Strategies\PaymentProcessors;

use App\Services\PaymentProcessService\Strategies\PaymentProcessors\Interfaces\IPaypalPaymentProcessor;
use Systemeio\TestForCandidates\PaymentProcessor\PaypalPaymentProcessor as ExternalPaymentProcessor;

class PaypalPaymentProcessor implements IPaypalPaymentProcessor
{
    public function __construct(private ExternalPaymentProcessor $paymentProcessor) {}

    public function pay(int $price): bool
    {
        try {
            $this->paymentProcessor->pay($price);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }
}