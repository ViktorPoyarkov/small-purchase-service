<?php

namespace App\Services\PaymentProcessService\Strategies\SupportCheckers;

class StripeSupportPaymentProcessorChecker
    extends AbstractSupportPaymentProcessorChecker
    implements Interfaces\IStripeSupportPaymentProcessorChecker
{
    protected string $paymentProcessor = 'stripe';
}